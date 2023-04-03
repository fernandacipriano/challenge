<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'name' => 'Senhor Loja A',
            'email' => 'lojaa@gmail.com',
            'password' => Hash::make('password'),
            'type' => 'SHOPKEEPER',
            'balance' => 1000,
            'identity' => '123456789',
        ]);

        DB::table('users')->insert([
            'name' => 'Senhor Loja B',
            'email' => 'lojab@gmail.com',
            'password' => Hash::make('password'),
            'type' => 'SHOPKEEPER',
            'balance' => 1000,
            'identity' => '123456780',
        ]);

        DB::table('users')->insert([
            'name' => 'Senhor Usuário A',
            'email' => 'usera@gmail.com',
            'password' => Hash::make('password'),
            'type' => 'COMMON',
            'balance' => 1000,
            'identity' => '123456770',
        ]);

        DB::table('users')->insert([
            'name' => 'Senhor Usuário B',
            'email' => 'userb@gmail.com',
            'password' => Hash::make('password'),
            'type' => 'COMMON',
            'balance' => 1000,
            'identity' => '123456771',
        ]);
    }
}
