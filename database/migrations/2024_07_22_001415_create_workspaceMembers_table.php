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
        Schema::create('workspaceMembers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('w_id')->constrained(
                table: 'workspaces',
                indexName: 'worskpaceId'
            );
            $table->foreignId('w_anggota')->constrained(
                table: 'members',
                indexName: 'namaAnggota'
            );
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('workspace_members');
    }
};
