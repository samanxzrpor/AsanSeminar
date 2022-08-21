<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleAndPermissionSeeder extends Seeder
{
    private array $systemPermissions;

    private array $systemRoles;


    public function __construct()
    {
        $this->systemRoles = config('permission.roles');
        $this->systemPermissions = config('permission.permissions');
    }

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        # Store Roles in Database
        $this->storeRoles();
        # Store Permission in Database
        $this->storePermissions();
        # assign permissions to roles
        $this->assignPermissionsToRoles();
    }

    private function storePermissions()
    {
        $dbPermissions = Permission::all();

        if ($dbPermissions->count() < 1) {
            foreach ($this->systemPermissions as $permission) {
                Permission::create([
                    'name' => $permission
                ]);
            }
        }
    }

    private function storeRoles()
    {
        $dbRoles = Role::all();
        if ($dbRoles->count() < 1) {
            foreach ($this->systemRoles as $role) {
                Role::create([
                    'name' => $role
                ]);
            }
        }
    }

    private function assignPermissionsToRoles()
    {
        # Set Admins Permissions
        $this->setAdminPermissions();
        # Set Accountants Permissions
        $this->setAccountantPermissions();
    }

    private function setAdminPermissions()
    {
        $adminRole = Role::where('name' , 'Admin')->first();
        foreach ($this->systemPermissions as $permission) {
            $adminRole->givePermissionTo($permission);
        }
    }

    private function setAccountantPermissions()
    {
        $accountantRole = Role::where('name' , 'Accountant')->first();
        foreach ($this->systemPermissions as $permission) {
            if ($permission == 'Accountant')
                $accountantRole->addPermissionTo($permission);
        }
    }
}
