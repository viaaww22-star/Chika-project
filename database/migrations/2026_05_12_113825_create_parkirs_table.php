<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
public function up()
{
    Schema::create('parkirs', function (Blueprint $table) {
        $table->id();
        $table->foreignId('pengguna_id')->constrained()->onDelete('cascade');
        $table->foreignId('kendaraan_id')->constrained()->onDelete('cascade');
        $table->string('lokasi');
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('parkirs');
    }
};
