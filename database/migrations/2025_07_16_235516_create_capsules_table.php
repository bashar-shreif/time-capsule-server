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
        Schema::create('capsules', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->integer('privacy_settings_id');
            $table->integer('reveal_mode_id');
            $table->integer('mood_id');
            $table->integer('country_id');
            $table->text('message');
            $table->timestamps();
            $table->timestamp('revealed_at')->nullable();
        });
        Schema::create('moods', function (Blueprint $table) {
            $table->id();
            $table->string('mood');
            $table->timestamps();
        });
        Schema::create('countries', function (Blueprint $table) {
            $table->id();
            $table->string('country');
            $table->timestamps();
        });
        Schema::create('reveal_modes', function (Blueprint $table) {
            $table->id();
            $table->string('reveal_mode');
            $table->timestamps();
        });
        Schema::create('privacy_settings', function (Blueprint $table) {
            $table->id();
            $table->string('privacy_setting');
            $table->timestamps();
        });
        Schema::create('tags', function (Blueprint $table) {
            $table->id();
            $table->string('tag');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
