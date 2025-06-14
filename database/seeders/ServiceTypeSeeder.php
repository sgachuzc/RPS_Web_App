<?php

namespace Database\Seeders;

use App\Models\ServiceType;
use Illuminate\Database\Seeder;

class ServiceTypeSeeder extends Seeder {
    
    public function run(): void {
        ServiceType::create([
            'name' => 'Cursos'
        ]);
        ServiceType::create([
            'name' => 'Auditorías'
        ]);
    }
}
