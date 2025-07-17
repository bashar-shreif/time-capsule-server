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
        Schema::create('capsules_tags', function (Blueprint $table) {
            $table->integer('capsule_id');
            $table->integer('tag_id');
        });
        Schema::create('capsules_reveal_modes', function (Blueprint $table) {
            $table->integer('capsule_id');
            $table->integer('reveal_mode_id');
        });
        Schema::create('capsules_moods', function (Blueprint $table) {
            $table->integer('capsule_id');
            $table->integer('mood_id');
        });
        Schema::create('capsules_countries', function (Blueprint $table) {
            $table->integer('capsule_id');
            $table->integer('country_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('relations_tables');
    }
};
