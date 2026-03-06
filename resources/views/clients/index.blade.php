<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ get_config()->meta_title ?? 'Spa Massage Thư Giãn - Liệu Pháp Phục Hồi Sức Khỏe Toàn Diện' }}</title>
    <meta name="description"
        content="{{ get_config()->meta_description ?? 'Trải nghiệm dịch vụ spa & massage chuyên nghiệp tại TP. Hồ Chí Minh. Đội ngũ kỹ thuật viên lành nghề, không gian yên tĩnh, sản phẩm thiên nhiên cao cấp — giúp bạn phục hồi năng lượng và tìm lại cân bằng.' }}">
    <meta name="keywords"
        content="{{ get_config()->meta_keywords ?? 'spa massage, massage thư giãn, chăm sóc da mặt, liệu pháp cơ thể, spa tp hcm, massage trị liệu, chăm sóc sức khỏe' }}">
    <meta name="robots" content="index, follow">
    <link rel="canonical" href="{{ url()->current() }}" />

    {{-- Favicon --}}
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('/icons/favicon-16x16.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('/icons/favicon-16x16.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('/icons/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="144x144" href="{{ asset('/icons/android-chrome-144x144.png') }}">
    <link rel="icon" type="image/png" sizes="192x192" href="{{ asset('/icons/android-chrome-192x192.png') }}">
    <link rel="apple-touch-icon" sizes="57x57" href="{{ asset('/icons/apple-touch-icon-57x57.png') }}">
    <link rel="apple-touch-icon" sizes="60x60" href="{{ asset('/icons/apple-touch-icon-60x60.png') }}">
    <link rel="apple-touch-icon" sizes="72x72" href="{{ asset('/icons/apple-touch-icon-72x72.png') }}">
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('/icons/apple-touch-icon-76x76.png') }}">
    <link rel="apple-touch-icon" sizes="114x114" href="{{ asset('/icons/apple-touch-icon-114x114.png') }}">
    <link rel="apple-touch-icon" sizes="120x120" href="{{ asset('/icons/apple-touch-icon-120x120.png') }}">
    <link rel="apple-touch-icon" sizes="144x144" href="{{ asset('/icons/apple-touch-icon-144x144.png') }}">
    <link rel="apple-touch-icon" sizes="152x152" href="{{ asset('/icons/apple-touch-icon-152x152.png') }}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('/icons/apple-touch-icon.png') }}">
    <link rel="apple-touch-startup-image" href="{{ asset('/icons/apple-touch-icon-180x180.png') }}" />

    {{-- Open Graph --}}
    <meta property="og:type" content="website">
    <meta property="og:locale" content="vi_VN">
    <meta property="og:site_name" content="{{ get_config()->meta_title ?? 'Spa Massage' }}">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:title" content="{{ get_config()->meta_title ?? 'Spa Massage Thư Giãn - Liệu Pháp Phục Hồi Sức Khỏe Toàn Diện' }}">
    <meta property="og:description" content="{{ get_config()->meta_description ?? 'Trải nghiệm dịch vụ spa & massage chuyên nghiệp tại TP. Hồ Chí Minh. Đội ngũ kỹ thuật viên lành nghề, không gian yên tĩnh, sản phẩm thiên nhiên cao cấp.' }}">
    <meta property="og:image" content="{{ asset('/icons/512x512.png') }}">
    <meta itemprop="image" content="{{ asset('/icons/512x512.png') }}">

    <link rel="stylesheet" href="{{ asset('clients/css/style.css') }}">
</head>
<body>
qưe
</body>
</html>
