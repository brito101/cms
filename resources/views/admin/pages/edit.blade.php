@extends('adminlte::page')
@section('plugins.Summernote', true)

@section('title', '- Edição de Página')

@section('content')

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1><i class="fas fa-fw fa-file"></i> Editar Página</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('admin.pages.index') }}">Páginas</a>
                        </li>
                        <li class="breadcrumb-item active">Edição de Página</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">

                    @include('components.alert')

                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Dados Cadastrais da Página</h3>
                        </div>

                        <form method="POST" action="{{ route('admin.pages.update', ['page' => $page->id]) }}">
                            @csrf
                            @method('PUT')
                            <input type="hidden" name="id" value="{{ $page->id }}">
                            <div class="card-body">


                                <div class="d-flex flex-wrap justify-content-between">
                                    <div class="col-12 form-group px-0">
                                        <label for="name">Título</label>
                                        <input type="text" class="form-control" id="title"
                                            placeholder="Título da Página" name="title"
                                            value="{{ old('title') ?? $page->title }}" required>
                                    </div>

                                    <div class="col-12 form-group px-0">
                                        @php
                                            $config = [
                                                'language' => ['url' => asset('vendor/datatables/js/pt-BR.json')],
                                                'height' => '400',
                                                'toolbar' => [
                                                    // [groupName, [list of button]]
                                                    ['style', ['bold', 'italic', 'underline', 'clear']],
                                                    ['font', ['strikethrough', 'superscript', 'subscript']],
                                                    ['fontsize', ['fontsize']],
                                                    ['color', ['color']],
                                                    ['para', ['ul', 'ol', 'paragraph']],
                                                    ['height', ['height']],
                                                    ['table', ['table']],
                                                    ['insert', ['link', 'picture', 'video']],
                                                    ['view', ['fullscreen', 'codeview', 'help']],
                                                ],
                                            ];
                                        @endphp
                                        <x-adminlte-text-editor name="body" label="Corpo" label-class="text-dark"
                                            igroup-size="sm" placeholder="Conteúdo da Página..." :config="$config">
                                            {!! old('body') ?? $page->body !!}
                                        </x-adminlte-text-editor>
                                    </div>
                                </div>

                            </div>

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Enviar</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
