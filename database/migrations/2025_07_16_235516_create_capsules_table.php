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
            $table->integer('location_id');
            $table->integer('privacy_settings_id');
            $table->integer('reveal_mode_id');
            $table->integer('mood_id');
            $table->text('message');
            $table->string('media_url')->nullable();
            $table->timestamps();
            $table->timestamp('revealed_at')->useCurrent();
        });
        Schema::create('moods', function (Blueprint $table) {
            $table->id();
            $table->string('mood')->unique();
            $table->timestamps();
        });
        Schema::create('location_models', function (Blueprint $table) {
            $table->id();
            $table->string('ip_address')->nullable();
            $table->string('country_name')->nullable();
            $table->string('country_code')->nullable();
            $table->string('region_code')->nullable();
            $table->string('region_name')->nullable();
            $table->string('city_name')->nullable();
            $table->string('zip_code')->nullable();
            $table->string('iso_code')->nullable();
            $table->decimal('latitude', 10, 6)->nullable();
            $table->decimal('longitude', 10, 6)->nullable();
            $table->string('metro_code')->nullable();
            $table->string('area_code')->nullable();
            $table->string('timezone')->nullable();
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
