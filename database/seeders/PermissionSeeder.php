<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Category Permissions
        Permission::create(['name' => 'category.create']);
        Permission::create(['name' => 'category.edit']);
        Permission::create(['name' => 'category.list']);

        // Subcategory Permissions
        Permission::create(['name' => 'subcategory.create']);
        Permission::create(['name' => 'subcategory.edit']);
        Permission::create(['name' => 'subcategory.list']);

        // Products Permissions
        Permission::create(['name' => 'product.create']);
        Permission::create(['name' => 'product.edit']);
        Permission::create(['name' => 'product.delete']);
        Permission::create(['name' => 'product.list']);
    }
}
