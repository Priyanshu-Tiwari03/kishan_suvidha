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
        Schema::create('schemes', function (Blueprint $table) {
            $table->id('scheme_id');
        $table->string('scheme_title');
        $table->text('description');
        $table->string('image')->nullable(); // Store path to image
        $table->decimal('applying_fee', 8, 2);
        $table->date('last_date');
        $table->enum('status', ['active', 'inactive'])->default('active');
        $table->string('url')->nullable();
        $table->timestamps();
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('schemes');
    }
};
