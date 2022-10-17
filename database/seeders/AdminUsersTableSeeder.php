<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class AdminUsersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('admin_users')->delete();
        
        \DB::table('admin_users')->insert(array (
            0 => 
            array (
                'id' => 1,
                'username' => 'admin',
                'password' => '$2y$10$CW/nRFNl/br0BjBaIl0VJeNIiIAKTExvuukYs62c00/Ryheu3L/By',
                'name' => 'Administrator',
                'avatar' => NULL,
                'remember_token' => NULL,
                'created_at' => '2022-10-17 16:04:22',
                'updated_at' => '2022-10-17 16:04:22',
            ),
        ));
        
        
    }
}