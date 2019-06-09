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
            'form',
            'report',
        ];
        // // 'comment', // 6
        // 'theme', // 9 
        // 'block', // 10
        // 'widget', // 11
        // //'seo' // 12 
        // 'form', // 13
        // // 'report', // 14
        // // 'notification', // 15
        // // 'menu', // 16

        $roles = [];
        $user = User::where('email', 'farid.sh69@gmail.com')->first();
        $user_2 = User::where('email', 'farid.sh692@gmail.com')->first();
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
