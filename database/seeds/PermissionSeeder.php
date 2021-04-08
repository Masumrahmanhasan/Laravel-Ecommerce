<?php

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
        Permission::updateOrCreate(['name' => 'view backend']);
        Permission::updateOrCreate(['name' => 'view categories']);
        Permission::updateOrCreate(['name' => 'view products']);
    }
}
