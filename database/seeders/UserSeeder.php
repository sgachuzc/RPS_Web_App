<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder {
    
    public function run(): void {
        User::create([
            'name' => 'Admin',
            'username' => 'sergio.gachuz',
            'email' => 'sergioegch@gmail.com',
            'password' => Hash::make('123456A@'),
            'role_id' => 1
        ]);

        User::factory()->count(5)->create();
    }
}
