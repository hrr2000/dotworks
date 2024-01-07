<?php

use Illuminate\Database\Seeder;

class ServiceStateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('service_states')->insert([
            [
                'name' => 'pending',
                'text' => 'Pending'
            ],
            [
                'name' => 'complete',
                'text' => 'Published'
            ],
            [
                'name' => 'canceled',
                'text' => 'Denied'
            ],
            [
                'name' => 'deleted',
                'text' => 'Deleted'
            ]
        ]);
    }
}
