<?php

namespace App\Http\Controllers\Admin;

use App\Models\Permission;
use App\Http\Controllers\Controller;
use App\Http\Requests\PermissionStoreUpdate;

class PermissionController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:permissions_create', ['only' => ['create', 'store']]);
        $this->middleware('permission:permissions_edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:permissions_view', ['only' => ['show', 'index']]);
        $this->middleware('permission:permissions_delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Permission::latest()->paginate(10);

        return view('permissions.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('permissions.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\PermissionStoreUpdate  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PermissionStoreUpdate $request)
    {
        Permission::create($request->all());

        return redirect()->route('permissions.index')
            ->with('success', 'Permissão criado com sucesso!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Permission::findOrFail($id);

        return view('permissions.show', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Permission::findOrFail($id);
        
        return view('permissions.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\PermissionStoreUpdate  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PermissionStoreUpdate $request, $id)
    {
        $data = Permission::findOrFail($id);
        
        $data->update($request->all());

        return redirect()->route('permissions.index')
            ->with('success', 'Permissão atualiazado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Permission::findOrFail($id);
        
        $data->delete();

        return redirect()->route('permissions.index')
            ->with('success', 'Permissão deletado com sucesso!');
    }
}
