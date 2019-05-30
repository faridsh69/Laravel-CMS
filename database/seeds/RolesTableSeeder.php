<?php

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role = Role::create(['name' => 'writer']);
        $permission = Permission::create(['name' => 'edit articles']);
        $role->givePermissionTo($permission);
        $user->syncRoles(['writer', 'admin']);

        // @role('writer')
        //     I am a writer!
        // @endrole

        // @can('edit articles')
        //   //
        // @endcan
    }
}
