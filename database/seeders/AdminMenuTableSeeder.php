<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class AdminMenuTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('admin_menu')->delete();
        
        \DB::table('admin_menu')->insert(array (
            0 => 
            array (
                'id' => 1,
                'parent_id' => 0,
                'order' => 1,
                'title' => 'Index',
                'icon' => 'feather icon-bar-chart-2',
                'uri' => '/',
                'extension' => '',
                'show' => 1,
                'created_at' => '2022-10-17 16:04:22',
                'updated_at' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'parent_id' => 0,
                'order' => 2,
                'title' => 'Admin',
                'icon' => 'feather icon-settings',
                'uri' => '',
                'extension' => '',
                'show' => 1,
                'created_at' => '2022-10-17 16:04:22',
                'updated_at' => NULL,
            ),
            2 => 
            array (
                'id' => 3,
                'parent_id' => 2,
                'order' => 3,
                'title' => 'Users',
                'icon' => '',
                'uri' => 'auth/users',
                'extension' => '',
                'show' => 1,
                'created_at' => '2022-10-17 16:04:22',
                'updated_at' => NULL,
            ),
            3 => 
            array (
                'id' => 4,
                'parent_id' => 2,
                'order' => 4,
                'title' => 'Roles',
                'icon' => '',
                'uri' => 'auth/roles',
                'extension' => '',
                'show' => 1,
                'created_at' => '2022-10-17 16:04:22',
                'updated_at' => NULL,
            ),
            4 => 
            array (
                'id' => 5,
                'parent_id' => 2,
                'order' => 5,
                'title' => 'Permission',
                'icon' => '',
                'uri' => 'auth/permissions',
                'extension' => '',
                'show' => 1,
                'created_at' => '2022-10-17 16:04:22',
                'updated_at' => NULL,
            ),
            5 => 
            array (
                'id' => 6,
                'parent_id' => 2,
                'order' => 6,
                'title' => 'Menu',
                'icon' => '',
                'uri' => 'auth/menu',
                'extension' => '',
                'show' => 1,
                'created_at' => '2022-10-17 16:04:22',
                'updated_at' => NULL,
            ),
            6 => 
            array (
                'id' => 7,
                'parent_id' => 2,
                'order' => 7,
                'title' => 'Extensions',
                'icon' => '',
                'uri' => 'auth/extensions',
                'extension' => '',
                'show' => 1,
                'created_at' => '2022-10-17 16:04:22',
                'updated_at' => NULL,
            ),
        ));
        
        
    }
}