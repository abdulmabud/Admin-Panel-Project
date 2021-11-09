<?php

namespace Database\Seeders;

use App\Models\Module;
use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $module = Module::updateOrCreate(['name'=>'Admin Dashboard']);
        Permission::updateOrCreate([
            'module_id' => $module->id,
            'name' => 'Access Dashbarod',
            'slug' => 'app.dashboard'
        ]);

        $module = Module::updateOrCreate(['name'=>'Role Management']);
        Permission::updateOrCreate([
            'module_id' => $module->id,
            'name' => 'Access Role',
            'slug' => 'app.role.index'
        ]);
        Permission::updateOrCreate([
            'module_id' => $module->id,
            'name' => 'Create Role',
            'slug' => 'app.role.create'
        ]);
        Permission::updateOrCreate([
            'module_id' => $module->id,
            'name' => 'Update Role',
            'slug' => 'app.role.edit'
        ]);
        Permission::updateOrCreate([
            'module_id' => $module->id,
            'name' => 'Delete Role',
            'slug' => 'app.role.destroy'
        ]);

        $module = Module::updateOrCreate(['name'=>'User Management']);
        Permission::updateOrCreate([
            'module_id' => $module->id,
            'name' => 'Access User',
            'slug' => 'app.user.index'
        ]);
        Permission::updateOrCreate([
            'module_id' => $module->id,
            'name' => 'Create User',
            'slug' => 'app.user.create'
        ]);
        Permission::updateOrCreate([
            'module_id' => $module->id,
            'name' => 'Update User',
            'slug' => 'app.user.edit'
        ]);
        Permission::updateOrCreate([
            'module_id' => $module->id,
            'name' => 'Delete User',
            'slug' => 'app.user.destroy'
        ]);
    }
}
