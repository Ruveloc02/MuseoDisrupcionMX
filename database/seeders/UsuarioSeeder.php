<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsuarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('users')->insert([
            'name' => 'Isaac',
            'email' => 'i.rodriguezbueno7@gmail.com',
            'password' => Hash::make('Disrupcion2021@'),

        ]);
    }
}
