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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('name',70);
            $table->string('slug',70)->unique();
            $table->string('product_image')->nullable();
            $table->foreignId('created_by')->constrained('users');
            $table->foreignId('unit_id')->constrained('units');
            $table->foreignId('currency_id')->constrained('currencies');
            $table->text('description')->nullable();
            $table->decimal('price', 10);
            $table->float('qty')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
