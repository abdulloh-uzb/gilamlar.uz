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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId("customer_id")->constrained("users")->cascadeOnDelete();
            $table->decimal("total_price", 10, 2);
            $table->enum("delivery_status", ["pending", "shipped", "on_the_way", "delivered", "failed"]);
            $table->string("delivery_failed_reason")->nullable();
            $table->enum("payment_status", ["pending", "completed", "failed"]);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
