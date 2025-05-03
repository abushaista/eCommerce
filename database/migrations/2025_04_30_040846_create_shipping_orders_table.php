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
        Schema::create('shipping_orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('order_id')->constrained('orders')->cascadeOnDelete();
            $table->string('shipping_code')->unique();
            $table->string('delivery_provider');
            $table->string('recipient_name');
            $table->string('receipient_phone');
            $table->string('customer_address');
            $table->string('customer_province');
            $table->string('customer_city');
            $table->string('customer_distict');
            $table->string('customer_subdistrict');
            $table->string('customer_postalcode');
            $table->enum('status',['new','sorting','processing','delivered','rejected'])->default('new');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('shipping_orders');
    }
};
