<?php

use App\Models\Service;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::table('certificates', function (Blueprint $table) {
            $table->foreignIdFor(Service::class);
        });
    }

    public function down(): void {
        Schema::table('certificates', function (Blueprint $table) {
            $table->dropForeignIdFor(Service::class);
        });
    }
};
