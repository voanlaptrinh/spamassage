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
        Schema::create('config_servers', function (Blueprint $table) {
            $table->id();
             $table->string('email')->nullable();
            $table->string('hotline')->nullable();
            $table->string('phone')->nullable();
            $table->string('zalo_number')->nullable();
            $table->string('address')->nullable();
            $table->text('google_map_embed')->nullable();

            // Nhóm 3: Mạng xã hội
            $table->string('facebook_url')->nullable();
            $table->string('zalo_url')->nullable();
            $table->string('youtube_url')->nullable();
            $table->string('tiktok_url')->nullable();
            $table->string('instagram_url')->nullable();
            $table->string('linkedin_url')->nullable();
            $table->string('twitter_url')->nullable();

            // Nhóm 4: SEO
            $table->string('meta_title')->nullable();
            $table->string('meta_keywords')->nullable();
            $table->text('meta_description')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('config_servers');
    }
};
