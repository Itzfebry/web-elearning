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
        Schema::create('siswa', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("user_id");
            $table->String("nisn", 12)->unique();
            $table->String("nama", 100);
            $table->enum("jk", ["L", "P"]);
            $table->String("kelas", 10);
            $table->String("tahun_ajaran", 9);
            $table->timestamps();

            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->foreign('kelas')
                ->references('nama')
                ->on('kelas')
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->foreign('tahun_ajaran')
                ->references('tahun')
                ->on('tahun_ajaran')
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('siswa');
    }
};
