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
        Schema::create('penggunas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pengguna_id')->constrained(
                table: 'anggota',
                indexName: 'user_id'
            );
            $table->foreignId('seksi_id')->constrained(
                table: 'seksi',
                indexName: 'id_seksi'
            );
            $table->string("status");
            $table->string("username");
            $table->string("password");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('penggunas');
    }
};
