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
        Schema::create('order_clothing', function (Blueprint $table) {
            $table->id();

            $table->bigInteger('clothing_id')->unsigned();

            $table->foreignId('customer_id')->constrained()->cascadeOnDelete()->cascadeOnUpdate();

            $table->foreign('clothing_id')->references('id')->on('clothing')->cascadeOnDelete()->cascadeOnUpdate();

            // ------------------------------------------------------------------------------------------------------------
            $table->integer('jumlah')->unsigned();
            $table->integer('total_harga')->unsigned();
            $table->string('ukuran');

            $table->text('keterangan')->nullable();

            $table->enum('status', ['pending', 'berhasil', 'gagal'])->default('pending');
            
            $table->string('desain')->nullable();

            $table->string('bukti');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order_clothing');
    }
};
