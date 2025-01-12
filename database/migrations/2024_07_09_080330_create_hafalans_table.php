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
        Schema::create('hafalans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('siswa_id')->constrained('siswas');
            $table->foreignId('juz_id')->constrained('juzs');
            $table->foreignId('surat_id')->constrained('surats');
            $table->foreignId('pengajar_id')->constrained('users');
            $table->integer('mulai_ayat');
            $table->integer('akhir_ayat')->nullable();
            $table->string('nilai');
            $table->text('catatan')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hafalans');
    }
};
