<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Caffeinated\Shinobi\Models\Role;
// Importado
use Caffeinated\Shinobi\Models\Permission;

class RoleController extends Controller
{   

    /* En el constructor se aplican los middlewares para los permisos */
    public function __construct()
    {

        $this->middleware( 'permission:roles.create' )->only( [ 'create', 'store' ] );

        $this->middleware( 'permission:roles.index' )->only( 'index' );

        $this->middleware( 'permission:roles.edit' )->only( [ 'edit', 'update' ] );

        $this->middleware( 'permission:roles.show' )->only( 'show' );

        $this->middleware( 'permission:roles.destroy' )->only( 'destroy' );

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $roles = Role::paginate();

        return view( 'roles.index', compact( 'roles' ) );

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $permissions = Permission::get();

        return view( 'roles.create', compact( 'permissions' ) );

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $role = Role::create( $request->all() );

        $role->permissions()->sync( $request->get( 'permissions' ) );

        return redirect()->route( 'roles.edit', $role->id )->with( 'info', 'Role guardado con éxito' );

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function show(Role $role)
    {
        
        return view( 'roles.show', compact( 'role' ) );

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function edit(Role $role)
    {
        $permissions = Permission::get();

        return view( 'roles.edit', compact( 'role', 'permissions' ) );

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Role $role)
    {
        /* Actualizar role */
        $role->update( $request->all() );

        /* Actualizar permisos */
        $role->permissions()->sync( $request->get( 'permissions' ) );

        return redirect()->route( 'roles.edit', $role->id )->with( 'info', 'Role actualizado con éxito' );

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role)
    {
        
        $role->delete();

        return back()->with( 'info', 'Eliminado correctamente' );

    }
}
