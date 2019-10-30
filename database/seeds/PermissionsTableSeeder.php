<?php

use Illuminate\Database\Seeder;
// Importado
use Caffeinated\Shinobi\Models\Permission;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        /* Permisos para Users */
            Permission::create( [

                'name' => 'Navegar usuarios',
                'slug' => 'users.index',
                'description' => 'Lista y navega todos los usuarios del sistema'

            ] );

            Permission::create( [

                'name' => 'Ver detalle de usuario',
                'slug' => 'users.show',
                'description' => 'Ver en detalle cada usuario del sistema'

            ] );

            Permission::create( [

                'name' => 'Edición de usuarios',
                'slug' => 'users.edit',
                'description' => 'Editar cualquier dato de un usuario del sistema'

            ] );

            Permission::create( [

                'name' => 'Eliminar usuario',
                'slug' => 'users.destroy',
                'description' => 'Eliminar cualquier usuario del sistema'

            ] );
        /*  */


        /* Permisos para Roles */
            Permission::create( [

                'name' => 'Navegar roles',
                'slug' => 'roles.index',
                'description' => 'Lista y navega todos los roles del sistema'

            ] );

            Permission::create( [
                
                'name' => 'Ver detalle de role',
                'slug' => 'roles.show',
                'description' => 'Ver en detalle cada role del sistema'
                
                ] );
                
            Permission::create( [
    
                'name' => 'Creación de roles',
                'slug' => 'roles.create',
                'description' => 'Crea un role del sistema'
    
            ] );

            Permission::create( [

                'name' => 'Edición de role',
                'slug' => 'roles.edit',
                'description' => 'Editar cualquier dato de un role del sistema'

            ] );

            Permission::create( [

                'name' => 'Eliminar role',
                'slug' => 'roles.destroy',
                'description' => 'Eliminar cualquier role del sistema'

            ] );
        /*  */


        /* Permisos para Products */
            Permission::create( [

                'name' => 'Navegar productos',
                'slug' => 'products.index',
                'description' => 'Lista y navega todos los productos del sistema'

            ] );

            Permission::create( [
                
                'name' => 'Ver detalle de un producto',
                'slug' => 'products.show',
                'description' => 'Ver en detalle cada producto del sistema'
                
                ] );
                
            Permission::create( [
    
                'name' => 'Creación de productos',
                'slug' => 'products.create',
                'description' => 'Crea un producto del sistema'
    
            ] );

            Permission::create( [

                'name' => 'Edición de un producto',
                'slug' => 'products.edit',
                'description' => 'Editar cualquier dato de un producto del sistema'

            ] );

            Permission::create( [

                'name' => 'Eliminar un producto',
                'slug' => 'products.destroy',
                'description' => 'Eliminar cualquier producto del sistema'

            ] );
        /*  */

    }
}
