<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class PermissionsDemoSeeder extends Seeder
{
    /**
     * Create the roles manager and client.
     *
     * @return void
     */
    public function run()
    {
        // Reset cached roles and permissions
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        // create permissions
        Permission::create(['name' => 'create leads']);
        Permission::create(['name' => 'read leads']);
        Permission::create(['name' => 'update status leads']);

        // create roles and assign existing permissions
        $role_client = Role::create(['name' => 'client']);
        $role_client->givePermissionTo('create leads');

        $role_manager = Role::create(['name' => 'manager']);
        $role_manager->givePermissionTo('read leads');
        $role_manager->givePermissionTo('update status leads');

    }
}
