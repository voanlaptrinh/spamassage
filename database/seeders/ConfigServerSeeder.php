<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ConfigServer;

class ConfigServerSeeder extends Seeder
{
    public function run(): void
    {
        ConfigServer::truncate();

        ConfigServer::create([

            // Liên hệ
            'email'            => 'lienhe@spamassage.vn',
            'hotline'          => '0909 123 456',
            'phone'            => '028 3456 7890',
            'zalo_number'      => '0909123456',
            'address'          => '123 Đường Nguyễn Thị Minh Khai, Quận 3, TP. Hồ Chí Minh',
            'google_map_embed' => '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3919.4!2d106.69!3d10.78!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zMTDCsDQ2JzQ4LjAiTiAxMDbCsDQxJzI0LjAiRQ!5e0!3m2!1svi!2svn!4v1234567890" width="100%" height="300" style="border:0;" allowfullscreen="" loading="lazy"></iframe>',

            // Mạng xã hội
            'facebook_url'  => 'https://facebook.com/spamassage',
            'zalo_url'      => 'https://zalo.me/0909123456',
            'youtube_url'   => 'https://youtube.com/@spamassage',
            'tiktok_url'    => 'https://tiktok.com/@spamassage',
            'instagram_url' => 'https://instagram.com/spamassage',
            'linkedin_url'  => null,
            'twitter_url'   => null,

            // SEO
            'meta_title'       => 'Spa Massage Thư Giãn - Liệu Pháp Phục Hồi Sức Khỏe Toàn Diện',
            'meta_keywords'    => 'spa massage, massage thư giãn, chăm sóc da mặt, liệu pháp cơ thể, spa tp hcm, massage trị liệu, chăm sóc sức khỏe',
            'meta_description' => 'Trải nghiệm dịch vụ spa & massage chuyên nghiệp tại TP. Hồ Chí Minh. Đội ngũ kỹ thuật viên lành nghề, không gian yên tĩnh, sản phẩm thiên nhiên cao cấp — giúp bạn phục hồi năng lượng và tìm lại cân bằng.',

        ]);
    }
}
