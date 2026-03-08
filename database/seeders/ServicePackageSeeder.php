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
                'description'      => 'Liệu trình massage toàn thân 60 phút giúp giải tỏa căng thẳng, cải thiện tuần hoàn máu và phục hồi năng lượng sau ngày dài làm việc.',
                'price'            => 350000,
                'is_active'        => true,
                'meta_title'       => 'Massage Thư Giãn Toàn Thân - Phục Hồi Năng Lượng',
                'meta_description' => 'Liệu trình massage toàn thân 60 phút giúp giải tỏa căng thẳng, cải thiện tuần hoàn máu và phục hồi năng lượng sau ngày dài làm việc.',
            ],
            [
                'name'             => 'Massage Đá Nóng (Hot Stone)',
                'description'      => 'Sử dụng các loại đá tự nhiên được làm nóng để truyền nhiệt sâu vào các bó cơ, giúp giảm đau nhức xương khớp và cân bằng năng lượng cơ thể.',
                'price'            => 550000,
                'is_active'        => true,
                'meta_title'       => 'Massage Đá Nóng Hot Stone - Thư Giãn Sâu',
                'meta_description' => 'Liệu trình đá nóng độc đáo giúp thư giãn cơ sâu, giảm đau nhức xương khớp và cân bằng năng lượng cơ thể.',
            ],
            [
                'name'             => 'Chăm Sóc Da Mặt Cơ Bản',
                'description'      => 'Quy trình 5 bước chăm sóc da mặt: làm sạch sâu, tẩy tế bào chết, xông hơi, hút bã nhờn và dưỡng ẩm chuyên sâu giúp da sáng mịn tự nhiên.',
                'price'            => 280000,
                'is_active'        => true,
                'meta_title'       => 'Chăm Sóc Da Mặt Cơ Bản - Làm Sạch Sâu',
                'meta_description' => 'Liệu trình chăm sóc da mặt làm sạch sâu, tẩy tế bào chết và dưỡng ẩm chuyên sâu giúp da sáng mịn tự nhiên.',
            ],
            [
                'name'             => 'Massage Thái Cổ Truyền',
                'description'      => 'Kết hợp giữa các động tác ấn huyệt và kéo giãn kiểu yoga truyền thống Thái Lan, giúp tăng độ linh hoạt của khớp và giảm căng cơ hiệu quả.',
                'price'            => 450000,
                'is_active'        => true,
                'meta_title'       => 'Massage Thái Cổ Truyền - Liệu Pháp Truyền Thống',
                'meta_description' => 'Kỹ thuật massage Thái truyền thống kết hợp kéo giãn cơ thể và ấn huyệt, giúp tăng độ linh hoạt và giảm đau cơ hiệu quả.',
            ],
            [
                'name'             => 'Liệu Trình Dưỡng Thể Toàn Diện',
                'description'      => 'Gói liệu trình cao cấp trong 90 phút bao gồm: tẩy tế bào chết bằng muối biển, ủ dưỡng thảo mộc và massage tinh dầu toàn thân.',
                'price'            => 750000,
                'is_active'        => true,
                'meta_title'       => 'Liệu Trình Dưỡng Thể Toàn Diện - Spa Cao Cấp',
                'meta_description' => 'Gói liệu trình cao cấp kết hợp tẩy tế bào chết, ủ dưỡng và massage toàn thân — trải nghiệm spa đẳng cấp trong 90 phút.',
            ],
            [
                'name'             => 'Massage Đầu & Cổ Vai Gáy',
                'description'      => 'Tập trung giải quyết các điểm đau nhức vùng cổ, vai và gáy cho nhân viên văn phòng, giúp giảm đau mỏi nhanh chóng và cải thiện giấc ngủ.',
                'price'            => 200000,
                'is_active'        => true,
                'meta_title'       => 'Massage Đầu Cổ Vai Gáy - Giảm Đau Nhanh',
                'meta_description' => 'Liệu trình tập trung vùng đầu, cổ và vai gáy, giúp giảm đau nhức, căng cơ do ngồi làm việc lâu và cải thiện giấc ngủ.',
            ],
            [
                'name'             => 'Massage Đầu & Cổ Vai Gáy',
                'description'      => 'Tập trung giải quyết các điểm đau nhức vùng cổ, vai và gáy cho nhân viên văn phòng, giúp giảm đau mỏi nhanh chóng và cải thiện giấc ngủ.',
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
