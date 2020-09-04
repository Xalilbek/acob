<?php

use App\Lang;
use Illuminate\Database\Seeder;

class LangTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $lang = new Lang();
        $lang->name = 'az';
        $lang->save();

        $lang = new Lang();
        $lang->name = 'ru';
        $lang->save();

        $lang = new Lang();
        $lang->name = 'en';
        $lang->save();
    }
}
