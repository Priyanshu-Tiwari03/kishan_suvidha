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
        Schema::table('products', function (Blueprint $table) {
             $table->unsignedBigInteger('category_id')->nullable()->after('id'); // adjust 'after' as needed
        $table->unsignedBigInteger('sub_category_id')->nullable()->after('category_id');

        // Add foreign key constraints if your categories/sub_categories tables exist:
        $table->foreign('category_id')->references('id')->on('categories')->onDelete('set null');
        $table->foreign('sub_category_id')->references('id')->on('sub_categories')->onDelete('set null');
    });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
             $table->dropForeign(['category_id']);
        $table->dropForeign(['sub_category_id']);
        $table->dropColumn(['category_id', 'sub_category_id']);
        });
    }
};
