<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class AdminRolesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('admin_roles')->delete();
        
        \DB::table('admin_roles')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Administrator',
                'slug' => 'administrator',
                'created_at' => '2022-10-17 16:04:22',
                'updated_at' => '2022-10-17 16:04:22',
            ),
        ));
        
        
    }
}