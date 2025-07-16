<?php

use App\Models\ServiceType;
use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    
    public function up(): void {
        Schema::create('services', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('subtitle')->nullable();
            $table->string('type')->default('Curso');
            $table->string('version')->nullable();
            $table->string('nomenclature')->nullable();
            $table->integer('months_to_expire')->nullable();
            $table->boolean('available')->default(true);
            $table->boolean('featured')->default(false);
            $table->boolean('obsoleted')->default(false);
            $table->text('description')->nullable();
            $table->text('full_description')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void {
        Schema::dropIfExists('services');
    }
};
