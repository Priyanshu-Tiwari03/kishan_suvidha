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
           $table->id();
            $table->string('scheme_title');
            $table->text('description')->nullable();
            $table->string('image')->nullable();
            $table->decimal('applying_fee', 8, 2)->nullable();
            $table->date('last_date')->nullable();
            $table->boolean('status')->default(true);
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
