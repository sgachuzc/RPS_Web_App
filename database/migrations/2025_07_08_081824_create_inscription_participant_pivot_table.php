<?php

use App\Models\Inscription;
use App\Models\Participant;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    
    public function up(): void {
        Schema::create('inscription_participant', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Inscription::class)->constrained()->onDelete('cascade');
            $table->foreignIdFor(Participant::class)->constrained()->onDelete('cascade');
            $table->boolean('certificated_sent')->default(false);
            $table->timestamps();
        });
    }

    public function down(): void {
        Schema::dropIfExists('inscription_participant');
    }
};
