<?php

namespace Database\Seeders;

use App\Models\State;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StateSeeder extends Seeder {
    public function run(): void {
        State::create([
            'state' => 'Inicial'
        ]);
        State::create([
            'state' => 'En progreso'
        ]);
        State::create([
            'state' => 'Finalizado'
        ]);
    }
}
