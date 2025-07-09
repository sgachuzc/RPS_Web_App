<?php

use App\Models\Participant;
use App\Models\Service;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    
    public function up(): void {
        Schema::create('certificates', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Participant::class)->constrained();
            $table->foreignIdFor(Service::class)->constrained();
            $table->string('code')->unique();
            $table->string('service_version')->nullable();
            $table->date('issue_date');
            $table->date('expiry_date')->nullable();
            $table->boolean('sent')->default(false);
            $table->timestamps();
        });
    }

    public function down(): void {
        Schema::dropIfExists('certificates');
    }
};
