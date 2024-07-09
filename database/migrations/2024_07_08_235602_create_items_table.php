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
        Schema::create('items', function (Blueprint $table) {
            $table->char("id",4);
            $table->string("nama");
            $table->string("jumlahAnggota");
            $table->string("status");
            $table->date("dateStart");
            $table->date("dateEnd");
            $table->string("files");
            $table->integer("workspace");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('items');
    }
};
