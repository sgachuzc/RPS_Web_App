<?php

use App\Models\Customer;
use App\Models\Service;
use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {

    public function up(): void
    {
        Schema::create('inscriptions', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Service::class);
            $table->foreignIdFor(User::class);
            $table->foreignIdFor(Customer::class);
            $table->dateTime('start_date')->nullabe();
            $table->dateTime('end_date')->nullabe();
            $table->string('status')->default('Inicial');
            $table->timestamps();
        });
    }

    public function down(): void {
        Schema::dropIfExists('inscriptions');
    }
};
