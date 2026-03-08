<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ConfigServer extends Model
{
    use HasFactory;

    protected $fillable = [
        'email',
        'hotline',
        'phone',
        'zalo_number',
        'address',
        'google_map_embed',
        'facebook_url',
        'zalo_url',
        'youtube_url',
        'tiktok_url',
        'instagram_url',
        'linkedin_url',
        'twitter_url',
        'whatsapp_url',
        'viber_url',
        'meta_title',
        'meta_keywords',
        'meta_description',
    ];

    public static function getInstance(): self
    {
        return static::firstOrCreate([]);
    }
}
