<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $adminPermission = Permission::all();
        
        Role::updateOrCreate([
            'name' => 'Admin',
            'slug' => 'admin',
            'note' => 'This is super Admin',
            'deleteable' => 0
        ])->permissions()->sync($adminPermission->pluck('id'));
        // info($role->permissions());
        Role::updateOrCreate([
            'name' => 'User',
            'slug' => 'user',
            'note' => 'This is normal user',
            'deleteable' => 0
        ]);
    }
}
