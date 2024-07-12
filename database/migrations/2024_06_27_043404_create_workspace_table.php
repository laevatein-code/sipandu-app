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
        Schema::create('workspace', function (Blueprint $table) {
            $table->id();
            $table->string("nama");
            $table->foreignId('author_id')->constrained(
                table:'anggota',
                indexName:'NIP'
            );
            $table->foreignId('seksi_id')->constrained(
                table:'seksi',
                indexName:'id_seksi'
            );
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('workspace');
    }
};
