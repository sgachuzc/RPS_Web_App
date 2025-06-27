<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder {
    
    public function run(): void {
        User::create([
            'name' => 'Sergio Gachuz',
            'username' => 'sergio.gachuz',
            'email' => 'sergioegch@gmail.com',
            'password' => Hash::make('prueba123'),
            'role_id' => 1
        ]);

        User::factory()->count(5)->create();
    }
}
