<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ServicePackage;

class ServicePackageSeeder extends Seeder
{
    public function run(): void
    {
        ServicePackage::truncate();

        $packages = [
            [
                'name'             => 'Massage Thư Giãn Toàn Thân',
                'price'            => 350000,
                'is_active'        => true,
                'meta_title'       => 'Massage Thư Giãn Toàn Thân - Phục Hồi Năng Lượng',
                'meta_description' => 'Liệu trình massage toàn thân 60 phút giúp giải tỏa căng thẳng, cải thiện tuần hoàn máu và phục hồi năng lượng sau ngày dài làm việc.',
            ],
            [
                'name'             => 'Massage Đá Nóng (Hot Stone)',
                'price'            => 550000,
                'is_active'        => true,
                'meta_title'       => 'Massage Đá Nóng Hot Stone - Thư Giãn Sâu',
                'meta_description' => 'Liệu trình đá nóng độc đáo giúp thư giãn cơ sâu, giảm đau nhức xương khớp và cân bằng năng lượng cơ thể.',
            ],
            [
                'name'             => 'Chăm Sóc Da Mặt Cơ Bản',
                'price'            => 280000,
                'is_active'        => true,
                'meta_title'       => 'Chăm Sóc Da Mặt Cơ Bản - Làm Sạch Sâu',
                'meta_description' => 'Liệu trình chăm sóc da mặt làm sạch sâu, tẩy tế bào chết và dưỡng ẩm chuyên sâu giúp da sáng mịn tự nhiên.',
            ],
            [
                'name'             => 'Massage Thái Cổ Truyền',
                'price'            => 450000,
                'is_active'        => true,
                'meta_title'       => 'Massage Thái Cổ Truyền - Liệu Pháp Truyền Thống',
                'meta_description' => 'Kỹ thuật massage Thái truyền thống kết hợp kéo giãn cơ thể và ấn huyệt, giúp tăng độ linh hoạt và giảm đau cơ hiệu quả.',
            ],
            [
                'name'             => 'Liệu Trình Dưỡng Thể Toàn Diện',
                'price'            => 750000,
                'is_active'        => true,
                'meta_title'       => 'Liệu Trình Dưỡng Thể Toàn Diện - Spa Cao Cấp',
                'meta_description' => 'Gói liệu trình cao cấp kết hợp tẩy tế bào chết, ủ dưỡng và massage toàn thân — trải nghiệm spa đẳng cấp trong 90 phút.',
            ],
            [
                'name'             => 'Massage Đầu & Cổ Vai Gáy',
                'price'            => 200000,
                'is_active'        => true,
                'meta_title'       => 'Massage Đầu Cổ Vai Gáy - Giảm Đau Nhanh',
                'meta_description' => 'Liệu trình tập trung vùng đầu, cổ và vai gáy, giúp giảm đau nhức, căng cơ do ngồi làm việc lâu và cải thiện giấc ngủ.',
            ],
            [
                'name'             => 'Massage Đầu & Cổ Vai Gáy',
                'price'            => 200000,
                'is_active'        => true,
                'meta_title'       => 'Massage Đầu Cổ Vai Gáy - Giảm Đau Nhanh',
                'meta_description' => 'Liệu trình tập trung vùng đầu, cổ và vai gáy, giúp giảm đau nhức, căng cơ do ngồi làm việc lâu và cải thiện giấc ngủ.',
            ],
            [
                'name'             => 'Massage Đầu & Cổ Vai Gáy',
                'price'            => 200000,
                'is_active'        => true,
                'meta_title'       => 'Massage Đầu Cổ Vai Gáy - Giảm Đau Nhanh',
                'meta_description' => 'Liệu trình tập trung vùng đầu, cổ và vai gáy, giúp giảm đau nhức, căng cơ do ngồi làm việc lâu và cải thiện giấc ngủ.',
            ],
            [
                'name'             => 'Massage Đầu & Cổ Vai Gáy',
                'price'            => 200000,
                'is_active'        => true,
                'meta_title'       => 'Massage Đầu Cổ Vai Gáy - Giảm Đau Nhanh',
                'meta_description' => 'Liệu trình tập trung vùng đầu, cổ và vai gáy, giúp giảm đau nhức, căng cơ do ngồi làm việc lâu và cải thiện giấc ngủ.',
            ],
        ];

        foreach ($packages as $data) {
            ServicePackage::create($data);
        }
    }
}
