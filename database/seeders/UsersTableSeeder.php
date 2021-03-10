<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->delete();
        User::create([
        'name' => 'Juan Pablo Zapata',
        'email' => 'juanp.zapataa@autonoma.edu.co',
        'password' => Hash::make('admin'),
        ]);
    }
}
