<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Car;

class CarsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('cars')->delete();
        Car::create([
            'brand' => 'Chevrolet',
            'reference' => 'Camaro ss',
            'price' => 40000,
            'model' => 2019,
            'owner_id' => User::all()->random()->id,
        ]);
        Car::create([
            'brand' => 'Volkswagen',
            'reference' => 'Golf GTI',
            'price' => 20000,
            'model' => 2018,
            'owner_id' => User::all()->random()->id,
        ]);
        Car::create([
            'brand' => 'Mitsubishi',
            'reference' => 'Lancer evolution',
            'price' => 15000,
            'model' => 2020,
            'owner_id' => User::all()->random()->id,
        ]);

    }
}
