<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class DefaultPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permission = [
            [
                'id'            => 1,
                'name'          => 'Admin',
                'guard_name'     => 'web',
                'created_at'    => date('y-m-d h:m:s'),
            ],
            [
                'id'            => 2,
                'name'          => 'Manage Teacher Applications',
                'guard_name'     => 'web',
                'created_at'    => date('y-m-d h:m:s'),
            ],
            [
                'id'            => 3,
                'name'          => 'Manage Users',
                'guard_name'     => 'web',
                'created_at'    => date('y-m-d h:m:s'),
            ],
            [
                'id'            => 4,
                'name'          => 'Manage Donations',
                'guard_name'     => 'web',
                'created_at'    => date('y-m-d h:m:s'),
            ],
        ];

        Permission::insert($permission);
    }
}
