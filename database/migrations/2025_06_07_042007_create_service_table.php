<?php

use App\Models\ServiceType;
use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    
    public function up(): void {
        Schema::create('service', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('subtitle')->nullable();
            $table->text('description');
            $table->boolean('available')->default(true);
            $table->foreignIdFor(ServiceType::class);
            $table->foreignIdFor(User::class);
            $table->timestamps();
        });
    }

    public function down(): void {
        Schema::dropIfExists('service');
    }
};
