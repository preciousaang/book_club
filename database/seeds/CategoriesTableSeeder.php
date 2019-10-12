<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            [
                'title'=>'SCI-FI', 
                'image'=>'1.jpg', 
                'description'=>'This is the category for science fiction books',
            ],
            [
                'title'=>'Detective', 
                'image'=>'1.jpg', 
                'description'=>'This is the category for Lovers of crime and mystery',
            ],
            [
                'title'=>'Horror', 
                'image'=>'1.jpg', 
                'description'=>'This is the category for Lovers Horror and serious gore',
            ] 
        ]);
    }
}
