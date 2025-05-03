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
            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete();
            $table->string('order_number')->unique();
            $table->string('notes')->nullable();
            $table->string('payment_method')->nullable();
            $table->string('payment_status')->nullable();
            $table->enum('status',['new', 'processing','shipped', 'delivered', 'cancelled'])->default('new');
            $table->string('currency')->default('USD');
            $table->decimal('sub_total',10,2)->default(0);
            $table->string('shipping_method')->nullable();
            $table->decimal('shipping_amount',10,2)->default(0);
            $table->decimal('tax',10,2)->default(0);
            $table->decimal('total_amount',10,0)->default(0);
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
