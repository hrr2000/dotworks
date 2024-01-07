<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //$this->call(CategorySeeder::class);
        //$this->call(CountrySeeder::class);
        //$this->call(LanguageSeeder::class);
        /*
        DB::table('order_states')->delete();
        DB::table('order_states')->insert([
            [
                'name' => 'pending',
                'text' => 'Pending'
            ],
            [
                'name' => 'progress',
                'text' => 'In Progress'
            ],
            [
                'name' => 'complete',
                'text' => 'Complete'
            ],
            [
                'name' => 'canceled',
                'text' => 'Canceled'
            ]
        ]);
        */
        DB::table('service_states')->delete();

    }
}
