<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class PermissionsDemoSeeder extends Seeder
{
    /**
     * Create the initial roles and permissions.
     *
     * @return void
     */
    public function run()
    {
        // Reset cached roles and permissions
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        Permission::create(['guard_name' => 'api','name' => 'escritorio']);
        // create permissions
        Permission::create(['guard_name' => 'api','name' => 'registrar_cliente']);
        Permission::create(['guard_name' => 'api','name' => 'listar_cliente']);
        Permission::create(['guard_name' => 'api','name' => 'editar_cliente']);
        Permission::create(['guard_name' => 'api','name' => 'eliminar_cliente']);

        Permission::create(['guard_name' => 'api','name' => 'registrar_producto']);
        Permission::create(['guard_name' => 'api','name' => 'listar_producto']);
        Permission::create(['guard_name' => 'api','name' => 'editar_producto']);
        Permission::create(['guard_name' => 'api','name' => 'eliminar_producto']);
        
        Permission::create(['guard_name' => 'api','name' => 'registrar_contrato']);
        Permission::create(['guard_name' => 'api','name' => 'listar_contrato']);
        Permission::create(['guard_name' => 'api','name' => 'editar_contrato']);
        Permission::create(['guard_name' => 'api','name' => 'eliminar_contrato']);

        Permission::create(['guard_name' => 'api','name' => 'registrar_abm']);
        Permission::create(['guard_name' => 'api','name' => 'listar_abm']);
        Permission::create(['guard_name' => 'api','name' => 'editar_abm']);
        Permission::create(['guard_name' => 'api','name' => 'eliminar_abm']);

        Permission::create(['guard_name' => 'api','name' => 'registrar_adenda']);
        Permission::create(['guard_name' => 'api','name' => 'listar_adenda']);
        Permission::create(['guard_name' => 'api','name' => 'editar_adenda']);
        Permission::create(['guard_name' => 'api','name' => 'eliminar_adenda']);

        Permission::create(['guard_name' => 'api','name' => 'registrar_factura']);
        Permission::create(['guard_name' => 'api','name' => 'listar_factura']);
        Permission::create(['guard_name' => 'api','name' => 'editar_factura']);
        Permission::create(['guard_name' => 'api','name' => 'eliminar_factura']);

        Permission::create(['guard_name' => 'api','name' => 'registrar_sucursal']);
        Permission::create(['guard_name' => 'api','name' => 'listar_sucursal']);
        Permission::create(['guard_name' => 'api','name' => 'editar_sucursal']);
        Permission::create(['guard_name' => 'api','name' => 'eliminar_sucursal']);

        Permission::create(['guard_name' => 'api','name' => 'sincronizacion']);

        Permission::create(['guard_name' => 'api','name' => 'reportes']);

        Permission::create(['guard_name' => 'api','name' => 'registrar_rol']);
        Permission::create(['guard_name' => 'api','name' => 'listar_rol']);
        Permission::create(['guard_name' => 'api','name' => 'editar_rol']);
        Permission::create(['guard_name' => 'api','name' => 'eliminar_rol']);

        Permission::create(['guard_name' => 'api','name' => 'registrar_usuario']);
        Permission::create(['guard_name' => 'api','name' => 'listar_usuario']);
        Permission::create(['guard_name' => 'api','name' => 'editar_usuario']);
        Permission::create(['guard_name' => 'api','name' => 'eliminar_usuario']);

        Permission::create(['guard_name' => 'api','name' => 'configuracion']);

        
        // create roles and assign existing permissions

        $role = Role::create(['guard_name' => 'api','name' => 'Super-Admin']);
        // gets all permissions via Gate::before rule; see AuthServiceProvider

        $user = \App\Models\User::factory()->create([
            'name' => 'Super-Admin',
            'surname' => 'User',
            'email' => 'mlima@gmail.com',
            'password' => bcrypt('12345678'),
            'role_id' => $role->id,
        ]);
        $user->assignRole($role);
    }
}