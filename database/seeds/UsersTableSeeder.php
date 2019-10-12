<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function run()
    {

        DB::table('users')->insert(
            [
               [
                'first_name'=>'Precious',
                'last_name'=> 'Aang',
                'username'=>'preciousaang',
                'profile_pic'=>'indomie.jpg',
                'role_id'=>1,
                'email'=>'preciousaang@mail.com',
                'password'=>bcrypt('albert'),                
               ],
               [
                'first_name'=>'Precious',
                'last_name'=>'One',
                'username'=>'preciousone',
                'profile_pic'=>'indomie.jpg',
                'role_id'=>2,
                'email'=>'preciousone@mail.com',
                'password'=>bcrypt('albert'),
               ]
            ]
        );
        factory(App\User::class, 3)->create(['role_id'=>1]);
        factory(App\User::class, 20)->create();
    }
}
