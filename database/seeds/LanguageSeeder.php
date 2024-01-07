<?php

use Illuminate\Database\Seeder;

class LanguageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $dataJSON = File::get('database/data/languages.json');
        $languageObj = json_decode($dataJSON);
        foreach($languageObj as $lang){
            DB::table('languages')->insert([
                'name' => $lang->english,
                'code' => $lang->alpha2
            ]);
        }
    }
}
