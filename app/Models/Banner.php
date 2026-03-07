<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    protected $fillable = [
        'badge_text',
        'title',
        'subtitle',
        'description',
        'btn_primary_text',
        'btn_primary_url',
        'btn_secondary_text',
        'btn_secondary_url',
        'image',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    /**
     * Lấy banner duy nhất (singleton).
     */
    public static function getInstance(): self
    {
        return static::firstOrCreate([], [
            'title'               => 'Phục Hồi Sức Khỏe Toàn Diện & Thư Giãn',
            'badge_text'          => 'Chào mừng đến với chúng tôi',
            'description'         => 'Trải nghiệm liệu pháp spa & massage chuyên nghiệp — nơi không gian yên tĩnh và bàn tay lành nghề giúp bạn tìm lại cân bằng.',
            'btn_primary_text'    => 'Khám phá dịch vụ',
            'btn_primary_url'     => '#services',
            'btn_secondary_text'  => 'Tìm hiểu thêm',
            'btn_secondary_url'   => '#posts',
            'is_active'           => true,
        ]);
    }
}
