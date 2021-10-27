<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Permission;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\UserStoreUpdate;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:users_create', ['only' => ['create', 'store']]);
        $this->middleware('permission:users_edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:users_view', ['only' => ['show', 'index']]);
        $this->middleware('permission:users_delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = User::role('user')->latest()->paginate(10);

        return view('users.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\UserStoreUpdate  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserStoreUpdate $request)
    {
        User::create([
            'name' => Str::title($request->name),
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ])->assignRole($request->roles_id);

        return redirect()->route('users.index')
            ->with('success', 'Usuário criado com sucesso!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = User::findOrFail($id);
        $permissions = Permission::all();

        return view('users.show', compact('data', 'permissions'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = User::findOrFail($id);
        
        return view('users.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\UserStoreUpdate  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserStoreUpdate $request, $id)
    {
        $data = User::findOrFail($id);
        
        $data->update([
            'name' => Str::title($request->name),
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        $data->syncRoles($request->roles_id);
        
        return redirect()->route('users.index')
            ->with('success', 'Usuário editado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = User::findOrFail($id);
        $data->revokePermissionTo(Permission::all());
        $data->delete();

        return redirect()->route('users.index')
            ->with('success', 'Usuário deletado com sucesso!');
    }

    public function storePermissionsUser(Request $request, $id)
    {
        $data = User::findOrFail($id);

        $data->syncPermissions($request->permissions);

        return redirect()->route('users.index')
            ->with('success', 'Permissões do usuário atualizado');
    }
}
