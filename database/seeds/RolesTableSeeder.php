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
        $role = Role::updateOrCreate(['name' => 'blogger']);
        $permission_1 = Permission::updateOrCreate(['name' => 'view_blog']);
        $permission_2 = Permission::updateOrCreate(['name' => 'create_blog']);
        $role->syncPermissions([$permission_1, $permission_2]);

        $user = User::where('email', 'farid.sh69@gmail.com')->first();
        $user->syncRoles(['blogger']);
        
        // $role = Role::create(['name' => 'writer']);
        // $permission = Permission::create(['name' => 'edit articles']);
        // $role->givePermissionTo($permission);
        // $user->syncRoles(['writer', 'admin']);

        // @role('writer')
        //     I am a writer!
        // @endrole

        // @can('edit articles')
        //   //
        // @endcan
    }
}
