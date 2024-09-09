<?php
// database/seeders/RolesAndPermissionsSeeder.php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Role;
use App\Models\RolePermission;

class RolesAndPermissionsSeeder extends Seeder
{
    public function run()
    {
        $roles = [
            'admin',
            'presidente',
            'tesorero',
            'secretaria'
        ];

        foreach ($roles as $roleName) {
            $role = Role::create(['name' => $roleName]);

            // Asignar permisos basados en el rol
            if ($roleName == 'admin') {
                RolePermission::create(['role_id' => $role->id, 'permission' => 'manage_users']);
                RolePermission::create(['role_id' => $role->id, 'permission' => 'manage_roles']);
                RolePermission::create(['role_id' => $role->id, 'permission' => 'manage_settings']);
            } elseif ($roleName == 'presidente') {
                RolePermission::create(['role_id' => $role->id, 'permission' => 'manage_settings']);
            } elseif ($roleName == 'tesorero') {
                RolePermission::create(['role_id' => $role->id, 'permission' => 'manage_settings']);
            } elseif ($roleName == 'secretaria') {
                RolePermission::create(['role_id' => $role->id, 'permission' => 'view_balance']);
            }
        }
    }
}
