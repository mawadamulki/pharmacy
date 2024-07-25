<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('medicines', function (Blueprint $table) {
            $table->id();
            $table->text("scientific_name")->nullable();
            $table->text("commercial_name")->nullable();
            $table->text("classification")->nullable();
            $table->text("manufacturer")->nullable();
            $table->integer("available_quantity");
            $table->date("expiration_date");
            $table->Integer("price");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('medicines');
    }
};
