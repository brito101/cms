<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\PageRequest;
use App\Models\Page;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DataTables;
use illuminate\Support\Str;

class PageController extends Controller
{
    public function index(Request $request)
    {
        if (!Auth::user()->hasPermissionTo('Listar Páginas')) {
            abort(403, 'Acesso não autorizado');
        }

        $pages = Page::all('id', 'title');

        if ($request->ajax()) {
            return Datatables::of($pages)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $btn = '<a class="btn btn-xs btn-primary mx-1 shadow" title="Editar" href="pages/' . $row->id . '/edit"><i class="fa fa-lg fa-fw fa-pen"></i></a>' . '<a class="btn btn-xs btn-danger mx-1 shadow" title="Excluir" href="pages/destroy/' . $row->id . '" onclick="return confirm(\'Confirma a exclusão desta página?\')"><i class="fa fa-lg fa-fw fa-trash"></i></a>';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('admin.pages.index', compact('pages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (!Auth::user()->hasPermissionTo('Criar Páginas')) {
            abort(403, 'Acesso não autorizado');
        }
        return view('admin.pages.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PageRequest $request)
    {
        if (!Auth::user()->hasPermissionTo('Criar Páginas')) {
            abort(403, 'Acesso não autorizado');
        }

        $data = $request->all();
        $data['slug'] = Str::slug($request->title);
        $data['user_id'] = Auth::user()->id;

        $content = $request->body;
        $dom = new \DOMDocument();
        $dom->loadHtml($content, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
        $imageFile = $dom->getElementsByTagName('img');

        foreach ($imageFile as $item => $image) {
            $img = $image->getAttribute('src');
            if (filter_var($img, FILTER_VALIDATE_URL) == false) {
                list($type, $img) = explode(';', $img);
                list(, $img) = explode(',', $img);
                $imageData = base64_decode($img);
                $image_name =  $data['slug'] . '-' . time() . $item . '.png';
                $path = storage_path() . '/app/public/upload/' . $image_name;
                file_put_contents($path, $imageData);
                $image->removeAttribute('src');
                $image->removeAttribute('data-filename');
                $image->setAttribute('alt', $request->title);
                $image->setAttribute('src', url('storage/upload/' . $image_name));
            }
        }

        $content = $dom->saveHTML();
        $data['body'] = $content;

        $page = Page::create($data);

        if ($page->save()) {
            return redirect()
                ->route('admin.pages.index')
                ->with('success', 'Cadastro realizado!');
        } else {
            return redirect()
                ->back()
                ->withInput()
                ->with('error', 'Erro ao cadastrar!');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (!Auth::user()->hasPermissionTo('Editar Páginas')) {
            abort(403, 'Acesso não autorizado');
        }

        $page = Page::where('id', $id)->first();

        if (empty($page->id)) {
            abort(403, 'Acesso não autorizado');
        }
        return view('admin.pages.edit', compact('page'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PageRequest $request, $id)
    {
        if (!Auth::user()->hasPermissionTo('Editar Páginas')) {
            abort(403, 'Acesso não autorizado');
        }

        $page = Page::where('id', $id)->first();

        if (empty($page->id)) {
            abort(403, 'Acesso não autorizado');
        }

        $data = $request->all();
        $data['slug'] = Str::slug($request->title);
        $data['user_id'] = Auth::user()->id;

        $content = $request->body;
        $dom = new \DOMDocument();
        $dom->loadHtml($content, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
        $imageFile = $dom->getElementsByTagName('img');

        foreach ($imageFile as $item => $image) {
            $img = $image->getAttribute('src');
            if (filter_var($img, FILTER_VALIDATE_URL) == false) {
                list($type, $img) = explode(';', $img);
                list(, $img) = explode(',', $img);
                $imageData = base64_decode($img);
                $image_name =  $data['slug'] . '-' . time() . $item . '.png';
                $path = storage_path() . '/app/public/upload/' . $image_name;
                file_put_contents($path, $imageData);
                $image->removeAttribute('src');
                $image->removeAttribute('data-filename');
                $image->setAttribute('alt', $request->title);
                $image->setAttribute('src', url('storage/upload/' . $image_name));
            }
        }

        $content = $dom->saveHTML();
        $data['body'] = $content;

        if ($page->update($data)) {
            return redirect()
                ->route('admin.pages.index')
                ->with('success', 'Atualização realizada!');
        } else {
            return redirect()
                ->back()
                ->withInput()
                ->with('error', 'Erro ao atualizar!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (!Auth::user()->hasPermissionTo('Excluir Páginas')) {
            abort(403, 'Acesso não autorizado');
        }

        $page = Page::where('id', $id)->first();

        if (empty($page->id)) {
            abort(403, 'Acesso não autorizado');
        }

        if ($page->delete()) {
            return redirect()
                ->route('admin.pages.index')
                ->with('success', 'Exclusão realizada!');
        } else {
            return redirect()
                ->back()
                ->with('error', 'Erro ao excluir!');
        }
    }
}
