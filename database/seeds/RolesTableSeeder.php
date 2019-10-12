<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            [
                'name'=>'admin',
                'full_name'=>'Administrator',
                'description'=>'This is the administrator of the site.'
            ],
            [
                'name'=>'user',
                'full_name'=>'Site User',
                'description'=>'This is the site user.'
            ]
        ]);
    }
}
