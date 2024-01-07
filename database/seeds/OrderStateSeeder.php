<?php

use Illuminate\Database\Seeder;

class OrderStateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
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
    }
}
