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
        Schema::create('sizes', function (Blueprint $table) {
            $table->id();
            $table->enum("shape", ["tortburchak", "dumaloq", "metrik"]);
            $table->unsignedSmallInteger("width")->nullable();
            $table->unsignedSmallInteger("height")->nullable();
            $table->unsignedSmallInteger("diametr")->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sizes');
    }
};
