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
        Schema::table('capsules', function (Blueprint $table) {
            $table->string("color")->after("message")->nullable()->default(null);
            $table->string("background")->after("color")->nullable()->default(null);
            $table->string("ip_address")->after("background")->nullable()->default(null);
            $table->boolean("is_revealed")->after("ip_address")->default(false);
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
