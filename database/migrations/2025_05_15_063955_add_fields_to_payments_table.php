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
       Schema::create('payments', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('user_id')->nullable();
            $table->string('name');
            $table->string('email');
            $table->string('phone', 20);
            $table->decimal('amount', 10, 2);
            $table->string('razorpay_payment_id')->nullable();
            $table->string('order_id');
            $table->tinyInteger('status')->default(0);

            $table->timestamps();

            $table->unsignedBigInteger('product_id')->nullable();
            $table->string('apartment')->nullable();
            $table->string('city')->nullable();
            $table->string('district')->nullable();
            $table->string('state')->nullable();
            $table->string('pincode')->nullable();

            $table->integer('quantity')->default(1);
            $table->decimal('unit_price', 10, 2)->default(0);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
       
             Schema::dropIfExists('payments');
            //
      
    }
};
