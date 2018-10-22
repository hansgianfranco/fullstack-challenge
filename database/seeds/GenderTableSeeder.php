<?php

use Illuminate\Database\Seeder;
use App\Models\Gender;

class GenderTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $gender = new Gender();
        $gender->name = 'Hombre';
        $gender->save();

        $gender = new Gender();
        $gender->name = 'Mujer';
        $gender->save();

    }
}
