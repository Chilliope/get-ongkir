<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('shipping_costs', function (Blueprint $table) {
            $table->id();
            $table->string('origin');
            $table->string('destination');
            $table->integer('weight');
            $table->string('courier');
            $table->json('data'); 
            $table->timestamp('expired_at')->nullable(); 
            $table->timestamps();

            $table->unique(['origin','destination','weight','courier']); 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('shipping_costs');
    }
};
