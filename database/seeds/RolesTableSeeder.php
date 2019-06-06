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
        $models = ['blog', 'user', 'category', 'page', 'setting'];

        foreach($models as $model)
        {
            $role = Role::updateOrCreate(['name' => $model . '_manager']);
            $permission = [];
            $permission[] = Permission::updateOrCreate(['name' => 'index_' . $model]);
            $permission[] = Permission::updateOrCreate(['name' => 'view_' . $model]);
            $permission[] = Permission::updateOrCreate(['name' => 'create_' . $model]);
            $permission[] = Permission::updateOrCreate(['name' => 'update_' . $model]);
            $permission[] = Permission::updateOrCreate(['name' => 'delete_' . $model]);

            $role->syncPermissions($permission);
        }

        $user = User::where('email', 'farid.sh69@gmail.com')->first();
        $user->syncRoles([
            'blog_manager',
            'page_manager',
            'category_manager',
            'user_manager',
            'setting_manager',
        ]);
    }
}
