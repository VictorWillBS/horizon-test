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
        Schema::table("scores", function (Blueprint $table) {
            $table->renameColumn('note_1', 'score_1');
            $table->renameColumn('note_2', 'score_2');
            $table->renameColumn('note_3', 'score_3');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table("scores", function (Blueprint $table) {
            $table->renameColumn('score_1', 'note_1');
            $table->renameColumn('score_2', 'note_2');
            $table->renameColumn('score_3', 'note_3');
        });
    }
};
