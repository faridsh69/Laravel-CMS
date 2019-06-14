<?php

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $models = [
            'blog', 
            'page', 
            'category', 
            'user', 
            'settinggeneral',
            'settingcontact',
            'settingdeveloper',
            'tag',
            'media',
            'report',
            'notification',
            'menu',
            'comment',
            'form',
        ];
        // 'theme', // 9 
        // 'block', // 10
        // 'widget', // 11

        $roles = [];
        $user = User::where('id', 1)->first();
        $user_2 = User::where('id', 2)->first();
        foreach($models as $model)
        {
            $permission = [];
            $permission[] = Permission::updateOrCreate(['name' => 'index_' . $model]);
            $permission[] = Permission::updateOrCreate(['name' => 'view_' . $model]);
            $permission[] = Permission::updateOrCreate(['name' => 'create_' . $model]);
            $permission[] = Permission::updateOrCreate(['name' => 'update_' . $model]);
            $permission[] = Permission::updateOrCreate(['name' => 'delete_' . $model]);

            $role = Role::updateOrCreate(['name' => $model . '_manager']);
            $roles[] = $role->name;
            $role->syncPermissions($permission);
        }
        
        $user->syncRoles($roles);
        $user_2->syncRoles($roles);
    }
}
