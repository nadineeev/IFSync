<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AdminUserSeeder extends Seeder
{
    public function run(): void
{
    // Nadine Vasconcellos
    \App\Models\User::updateOrCreate(
        ['email' => 'nadine.almeida.2024003048@estudante.ifsudestemg.edu.br'],
        ['name' => 'Nadine Vasconcellos', 'password' => \Illuminate\Support\Facades\Hash::make('ifsync@123')]
    );

    // Arthur Souza
    \App\Models\User::updateOrCreate(
        ['email' => 'arthur.souza.2024007109@estudante.ifsudestemg.edu.br'],
        ['name' => 'Arthur Souza', 'password' => \Illuminate\Support\Facades\Hash::make('ifsync@123')]
    );

    // Áduler Viana
    \App\Models\User::updateOrCreate(
        ['email' => 'aduler.reis.2024007000@estudante.ifsudestemg.edu.br'],
        ['name' => 'Áduler Viana', 'password' => \Illuminate\Support\Facades\Hash::make('ifsync@123')]
    );
}

}
