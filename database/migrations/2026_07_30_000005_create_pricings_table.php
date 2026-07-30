<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('pricings', function (Blueprint $table) {
            $table->id();
            $table->enum('type', ['kursus', 'privat'])->default('kursus');
            $table->string('level'); // e.g. TK/SD, SMP/MTS, SMA/MA
            $table->decimal('price', 12, 0);
            $table->string('period')->default('Bulan'); // Bulan or Pertemuan
            $table->text('notes')->nullable();
            $table->boolean('is_active')->default(true);
            $table->integer('order')->default(0);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pricings');
    }
};
