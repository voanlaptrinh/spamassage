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
        Schema::table('config_servers', function (Blueprint $table) {
            $table->string('whatsapp_url')->nullable()->after('twitter_url');
            $table->string('viber_url')->nullable()->after('whatsapp_url');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('config_servers', function (Blueprint $table) {
            $table->dropColumn(['whatsapp_url', 'viber_url']);
        });
    }
};
