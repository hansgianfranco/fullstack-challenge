<?php

use Illuminate\Database\Seeder;
use App\Models\Division;

class DivisionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $division = new Division();
        $division->name = 'Administración';
        $division->save();

        $division = new Division();
        $division->name = 'Ventas';
        $division->save();

        $division = new Division();
        $division->name = 'Tecnologia';
        $division->save();

        $division = new Division();
        $division->name = 'Finanzas';
        $division->save();

        $division = new Division();
        $division->name = 'Marketing';
        $division->save();

    }
}
