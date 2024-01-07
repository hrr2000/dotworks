<?php

use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->delete();
        DB::table('categories')->insert([
            'name' => 'Digital Marketting'
        ]);
        DB::table('categories')->insert([
            'name' => 'Graphics & Design'
        ]);
        DB::table('categories')->insert([
            'name' => 'Writing & Translation'
        ]);
        DB::table('categories')->insert([
            'name' => 'Programming & Tech'
        ]);
        DB::table('categories')->insert([
            'name' => 'Music Audio'
        ]);
        DB::table('categories')->insert([
            'name' => 'Video & Animation'
        ]);
        DB::table('categories')->insert([
            'name' => 'Others'
        ]);
    }
}
