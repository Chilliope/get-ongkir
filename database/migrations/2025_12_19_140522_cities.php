<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('cities', function (Blueprint $table) {
            $table->unsignedInteger('id')->primary(); // id city dari API
            $table->unsignedInteger('province_id');
            $table->string('name');

            $table->foreign('province_id')
                  ->references('id')
                  ->on('provinces')
                  ->cascadeOnDelete();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('cities');
    }
};
