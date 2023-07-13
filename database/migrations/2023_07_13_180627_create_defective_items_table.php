<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('defective_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_id')->constrained()->cascadeOnDelete();
            $table->foreignId('entered_by_id')->constrained('users')->cascadeOnDelete();
            $table->foreignId('stock_transaction_id')->constrained()->cascadeOnDelete();
            $table->dateTime('reported_at');
            $table->integer('quantity');
            $table->enum('type', ['damaged', 'malfunction', 'expired']);
            $table->text('remarks');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('defective_items');
    }
};