<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\IntroPost;

class IntroPostSeeder extends Seeder
{
    public function run(): void
    {
        IntroPost::truncate();

        $posts = [
            [
                'title'            => 'Tại Sao Nên Massage Đều Đặn Mỗi Tháng?',
                'content'          => '<p>Massage không chỉ là một liệu pháp thư giãn đơn thuần — đây là phương pháp chăm sóc sức khỏe toàn diện được khoa học chứng minh có nhiều lợi ích vượt trội.</p><p>Các nghiên cứu cho thấy massage đều đặn giúp <strong>giảm nồng độ cortisol</strong> (hormone căng thẳng) lên đến 30%, đồng thời tăng serotonin và dopamine — những chất dẫn truyền thần kinh tạo cảm giác hạnh phúc và bình an.</p><p>Bên cạnh đó, massage còn cải thiện tuần hoàn máu, tăng cường hệ miễn dịch, giảm đau cơ xương khớp mãn tính và giúp ngủ ngon hơn. Chỉ cần 1-2 lần mỗi tháng, bạn sẽ cảm nhận rõ sự thay đổi tích cực trong cơ thể và tinh thần.</p>',
                'is_active'        => true,
                'meta_title'       => 'Tại Sao Nên Massage Đều Đặn Mỗi Tháng?',
                'meta_description' => 'Khám phá những lợi ích khoa học của việc massage đều đặn: giảm căng thẳng, cải thiện tuần hoàn, tăng cường miễn dịch và ngủ ngon hơn.',
            ],
            [
                'title'            => 'Sự Khác Biệt Giữa Massage Thư Giãn và Massage Trị Liệu',
                'content'          => '<p>Nhiều khách hàng thắc mắc nên chọn massage thư giãn hay massage trị liệu. Câu trả lời phụ thuộc vào mục tiêu của bạn.</p><p><strong>Massage thư giãn</strong> (Swedish massage) sử dụng các động tác nhẹ nhàng, êm ái nhằm giải tỏa căng thẳng tinh thần, cải thiện tâm trạng và mang lại cảm giác dễ chịu toàn thân. Đây là lựa chọn lý tưởng sau một tuần làm việc mệt mỏi.</p><p><strong>Massage trị liệu</strong> (Deep tissue / Therapeutic) tập trung vào các vùng cơ bị co cứng, đau nhức cụ thể với lực tác động sâu hơn. Phù hợp với người bị đau lưng mãn tính, đau vai gáy do tư thế hoặc vận động viên cần phục hồi cơ.</p><p>Đội ngũ kỹ thuật viên của chúng tôi sẽ tư vấn liệu trình phù hợp nhất dựa trên tình trạng cụ thể của bạn.</p>',
                'is_active'        => true,
                'meta_title'       => 'Massage Thư Giãn vs Massage Trị Liệu - Chọn Loại Nào?',
                'meta_description' => 'Tìm hiểu sự khác biệt giữa massage thư giãn và massage trị liệu để chọn đúng liệu trình phù hợp với nhu cầu của bạn.',
            ],
            [
                'title'            => 'Bí Quyết Chăm Sóc Da Sau Liệu Trình Spa',
                'content'          => '<p>Để duy trì kết quả sau mỗi buổi chăm sóc da tại spa, bạn cần thực hiện đúng quy trình dưỡng da tại nhà.</p><p><strong>Trong 24 giờ đầu</strong> sau liệu trình, tránh trang điểm và để da được "thở" tự nhiên. Lỗ chân lông sau khi được làm sạch sâu rất dễ bị bít lại nếu tiếp xúc với các hóa chất.</p><p><strong>Uống đủ nước</strong> là bước quan trọng nhất — ít nhất 2 lít nước mỗi ngày để duy trì độ ẩm từ bên trong, giúp da căng mịn lâu hơn.</p><p>Ngoài ra, hãy sử dụng kem chống nắng SPF 30+ mỗi sáng và dưỡng ẩm đều đặn sáng tối. Kết hợp thăm spa định kỳ 1 lần/tháng, da bạn sẽ luôn trong trạng thái tốt nhất.</p>',
                'is_active'        => true,
                'meta_title'       => 'Bí Quyết Chăm Sóc Da Sau Liệu Trình Spa Hiệu Quả',
                'meta_description' => 'Hướng dẫn chăm sóc da tại nhà sau khi trải nghiệm liệu trình spa để duy trì làn da sáng mịn và kết quả lâu dài.',
            ],
            [
                'title'            => 'Liệu Pháp Đá Nóng — Cổ Xưa Mà Hiệu Quả',
                'content'          => '<p>Liệu pháp đá nóng (Hot Stone Therapy) có nguồn gốc từ hàng nghìn năm trước, được sử dụng bởi người bản địa châu Mỹ và các nền văn hóa phương Đông để chữa lành và cân bằng năng lượng cơ thể.</p><p>Các viên đá basalt được nung nóng đến 55-60°C, sau đó đặt lên các điểm huyệt quan trọng trên cơ thể. Nhiệt độ từ đá truyền sâu vào cơ bắp, giúp <strong>giãn cơ nhanh gấp 5 lần</strong> so với massage thông thường.</p><p>Liệu trình đặc biệt phù hợp với người bị đau cơ mãn tính, rối loạn giấc ngủ và những ai cần giải phóng năng lượng tiêu cực tích tụ. Cảm giác ấm áp dễ chịu sẽ lan tỏa toàn thân, đưa bạn vào trạng thái thư giãn sâu nhất.</p>',
                'is_active'        => true,
                'meta_title'       => 'Liệu Pháp Đá Nóng Hot Stone - Nguồn Gốc và Lợi Ích',
                'meta_description' => 'Khám phá lịch sử và lợi ích của liệu pháp đá nóng Hot Stone — phương pháp cổ xưa giúp giãn cơ sâu, giảm đau và cân bằng năng lượng.',
            ],
        ];

        foreach ($posts as $i => $data) {
            IntroPost::create(array_merge($data, ['sort_order' => $i + 1]));
        }
    }
}
