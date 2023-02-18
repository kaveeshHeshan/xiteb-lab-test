<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class PermissionSyncSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role = Role::where('name', 'staff_member')->first();
        $permissions = Permission::all();

        if (!is_null($role)) {
            // Permissions assigning
            $role->givePermissionTo($permissions);
        }
    }
}
