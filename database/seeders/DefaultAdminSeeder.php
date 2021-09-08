<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class DefaultAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
                'id'              => 1,
                'status'          => 'active',
                'name'            => 'Master Admin',
                'mobile'          => '8902984277',
                'gender'          => 'male',
                'email'           => 'admin@garibpathshala.in',
                'password'        => bcrypt(random_bytes(32)),
                'created_at'      => date('y-m-d h:m:s'),
                'dp'              => 'default-male.png',
                'designation'     => 'Master Admin'
            ],
        ];

        User::insert($users);
    }
}
