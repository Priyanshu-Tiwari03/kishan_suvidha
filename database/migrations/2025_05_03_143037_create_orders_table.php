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
            $table->id('order_id');
            
            // Foreign key to users table
            $table->foreignId('uid')
                ->constrained('users')
                ->onDelete('cascade');

            // Address details (input during checkout)
            $table->string('address');
            $table->string('city');
            $table->string('pincode', 20);
            $table->string('phone', 20);

            // Foreign key to products table
            $table->foreignId('pid')
                ->constrained('products')
                ->onDelete('cascade');

            // Category and Sub-category from products table
            $table->foreignId('category')
                ->constrained('products', 'category_id');

            $table->foreignId('sub_category')
                ->constrained('products', 'sub_category_id');

            // Order details
            $table->decimal('total_price', 10, 2);
            $table->enum('payment_type', ['COD', 'UPI', 'Credit Card', 'Net Banking', 'Other']);
            $table->enum('payment_status', ['Paid', 'Pending', 'Failed', 'Refunded']);
            $table->enum('order_status', ['Pending', 'Processing', 'Shipped', 'Delivered', 'Cancelled']);
            $table->integer('quantity');

            // Timestamp when order is placed
            $table->timestamp('order_date')->useCurrent();
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
