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
        Schema::create('order_products', function (Blueprint $table) {
            $table->id();

            $table->foreignId('customer_id')->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            
            $table->foreignId('product_id')->constrained()->cascadeOnDelete()->cascadeOnUpdate();

            $table->integer('jumlah')->unsigned();
            $table->integer('total_harga');
            $table->string('keterangan');

            $table->enum('status', ['pending', 'berhasil', 'gagal'])->default('pending');

            $table->string('bukti');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order_products');
    }
};
