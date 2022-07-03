<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\SettingRequest;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DataTables;

class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if (!Auth::user()->hasPermissionTo('Listar Configurações do Site')) {
            abort(403, 'Acesso não autorizado');
        }

        $settings = Setting::all('id', 'name', 'content');

        if ($request->ajax()) {
            return Datatables::of($settings)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $btn = '<a class="btn btn-xs btn-primary mx-1 shadow" title="Editar" href="settings/' . $row->id . '/edit"><i class="fa fa-lg fa-fw fa-pen"></i></a>' . '<a class="btn btn-xs btn-danger mx-1 shadow" title="Excluir" href="settings/destroy/' . $row->id . '" onclick="return confirm(\'Confirma a exclusão desta configuração?\')"><i class="fa fa-lg fa-fw fa-trash"></i></a>';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('admin.settings.index', compact('settings'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (!Auth::user()->hasPermissionTo('Criar Configurações do Site')) {
            abort(403, 'Acesso não autorizado');
        }
        return view('admin.settings.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SettingRequest $request)
    {
        if (!Auth::user()->hasPermissionTo('Criar Configurações do Site')) {
            abort(403, 'Acesso não autorizado');
        }

        $data = $request->all();
        $data['user_id'] = Auth::user()->id;

        $setting = Setting::create($data);

        if ($setting->save()) {
            return redirect()
                ->route('admin.settings.index')
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
        if (!Auth::user()->hasPermissionTo('Editar Configurações do Site')) {
            abort(403, 'Acesso não autorizado');
        }

        $setting = Setting::where('id', $id)->first();

        if (empty($setting->id)) {
            abort(403, 'Acesso não autorizado');
        }
        return view('admin.settings.edit', compact('setting'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SettingRequest $request, $id)
    {
        if (!Auth::user()->hasPermissionTo('Editar Configurações do Site')) {
            abort(403, 'Acesso não autorizado');
        }

        $setting = Setting::where('id', $id)->first();

        if (empty($setting->id)) {
            abort(403, 'Acesso não autorizado');
        }

        $data = $request->all();
        $data['user_id'] = Auth::user()->id;

        if ($setting->update($data)) {
            return redirect()
                ->route('admin.settings.index')
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
        if (!Auth::user()->hasPermissionTo('Excluir Configurações do Site')) {
            abort(403, 'Acesso não autorizado');
        }

        $setting = Setting::where('id', $id)->first();

        if (empty($setting->id)) {
            abort(403, 'Acesso não autorizado');
        }

        if ($setting->delete()) {
            return redirect()
                ->route('admin.settings.index')
                ->with('success', 'Exclusão realizada!');
        } else {
            return redirect()
                ->back()
                ->with('error', 'Erro ao excluir!');
        }
    }
}
