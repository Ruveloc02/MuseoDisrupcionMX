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
            'name' => 'DisrupcionMX',
            'email' => 'carlos.ruizvelasco.lopez@gmail.com',
            'password' => Hash::make('Disrupcion123'),

        ]);
    }
}
