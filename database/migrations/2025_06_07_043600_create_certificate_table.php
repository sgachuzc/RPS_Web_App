<?php

use App\Models\Inscription;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    
    public function up(): void {
        Schema::create('certificates', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Inscription::class);
            $table->string('code')->unique();
            $table->date('issue_date');
            $table->date('expiry_date')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void {
        Schema::dropIfExists('certificates');
    }
};
