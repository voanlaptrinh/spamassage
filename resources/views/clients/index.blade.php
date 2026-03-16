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
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('/source/icons/favicon-16x16.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('/source/icons/favicon-16x16.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('/source/icons/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="144x144"
        href="{{ asset('/source/icons/android-chrome-144x144.png') }}">
    <link rel="icon" type="image/png" sizes="192x192"
        href="{{ asset('/source/icons/android-chrome-192x192.png') }}">

    <link rel="apple-touch-icon" sizes="114x114" href="{{ asset('/source/icons/apple-touch-icon-114x114.png') }}">
    <link rel="apple-touch-icon" sizes="120x120" href="{{ asset('/source/icons/apple-touch-icon-120x120.png') }}">
    <link rel="apple-touch-icon" sizes="144x144" href="{{ asset('/source/icons/apple-touch-icon-144x144.png') }}">
    <link rel="apple-touch-icon" sizes="152x152" href="{{ asset('/source/icons/apple-touch-icon-152x152.png') }}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('/source/icons/apple-touch-icon.png') }}">
    <link rel="apple-touch-icon" sizes="57x57" href="{{ asset('/source/icons/apple-touch-icon-57x57.png') }}">
    <link rel="apple-touch-icon" sizes="60x60" href="{{ asset('/source/icons/apple-touch-icon-60x60.png') }}">
    <link rel="apple-touch-icon" sizes="72x72" href="{{ asset('/source/icons/apple-touch-icon-72x72.png') }}">
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('/source/icons/apple-touch-icon-76x76.png') }}">
    <link rel="apple-touch-startup-image" href="{{ asset('/source/icons/apple-touch-icon-180x180.png') }}" />
    <meta property="og:image" content="{{ URL::to('/source/icons/512x512.png') }}">
    <meta itemprop="image" content="{{ asset('/source/icons/512x512.png') }}">

    {{-- Open Graph --}}
    <meta property="og:type" content="website">
    <meta property="og:locale" content="vi_VN">
    <meta property="og:site_name" content="{{ get_config()->meta_title ?? 'Spa Massage' }}">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:title"
        content="{{ get_config()->meta_title ?? 'Spa Massage Thư Giãn - Liệu Pháp Phục Hồi Sức Khỏe Toàn Diện' }}">
    <meta property="og:description"
        content="{{ get_config()->meta_description ?? 'Trải nghiệm dịch vụ spa & massage chuyên nghiệp tại TP. Hồ Chí Minh.' }}">


    <link rel="stylesheet" href="{{ asset('clients/css/style.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>

<body>

    {{-- Skip navigation — cho người dùng bàn phím & screen reader --}}
    <a class="skip-link" href="#main-content">Bỏ qua điều hướng, đến nội dung chính</a>

    {{-- ===== HEADER ===== --}}
    <header class="spa-header" id="spaHeader" role="banner">
        <div class="nav-inner">
            <a href="#home" class="nav-logo" aria-label="Trang chủ Spa Massage">
                {{ get_config()->meta_title ? Str::words(get_config()->meta_title, 2, '') : 'Spa' }}
                <span>Massage</span>
            </a>

            <nav aria-label="Điều hướng chính">
                <ul class="nav-links" id="navLinks" role="list">
                    <li role="listitem"><a href="#home" aria-label="Trang chủ">Trang chủ</a></li>
                    <li role="listitem"><a href="#posts" aria-label="Bài viết giới thiệu">Giới thiệu</a></li>
                    <li role="listitem"><a href="#services" aria-label="Gói dịch vụ spa">Dịch vụ</a></li>
                    <li role="listitem"><a href="#contact" aria-label="Thông tin liên hệ">Liên hệ</a></li>
                </ul>
            </nav>

            <button class="nav-toggle" id="navToggle" aria-label="Mở menu điều hướng" aria-expanded="false"
                aria-controls="navLinks" onclick="toggleNav(this)">
                <span aria-hidden="true"></span>
                <span aria-hidden="true"></span>
                <span aria-hidden="true"></span>
            </button>
        </div>
    </header>

    {{-- ===== MAIN CONTENT ===== --}}
    <main id="main-content" tabindex="-1">

        {{-- ===== HERO ===== --}}
        @if ($banner->is_active)
        <section class="hero" id="home" aria-labelledby="hero-heading"
            @if ($banner->image) style="background-image: linear-gradient(135deg, rgba(26,18,9,.85) 0%, rgba(45,31,10,.8) 100%), url('{{ asset('storage/' . $banner->image) }}'); background-size: cover; background-position: center;" @endif>
            <div class="hero-content">
                @if ($banner->badge_text)
                    <div class="hero-badge" aria-hidden="true">{{ $banner->badge_text }}</div>
                @endif
                <h1 id="hero-heading">{{ $banner->title }}</h1>
                @if ($banner->description)
                    <p>{{ $banner->description }}</p>
                @endif
                <div class="hero-btns">
                    @if ($banner->btn_primary_text)
                        <a href="{{ $banner->btn_primary_url ?? '#' }}"
                            class="btn-gold">{{ $banner->btn_primary_text }}</a>
                    @endif
                    @if ($banner->btn_secondary_text)
                        <a href="{{ $banner->btn_secondary_url ?? '#' }}"
                            class="btn-outline-gold">{{ $banner->btn_secondary_text }}</a>
                    @endif
                </div>
            </div>
            <div class="hero-scroll" aria-hidden="true">
                <span>Cuộn xuống</span>
                <i class="bi bi-chevron-down"></i>
            </div>
        </section>
        @endif

        {{-- ===== INTRO POSTS SLIDER ===== --}}
        <section class="posts-section" id="posts" aria-labelledby="posts-heading">
            <div class="section-inner">
                <span class="section-label" aria-hidden="true">Giới thiệu</span>
                <h2 class="section-title" id="posts-heading">Bài Viết Giới Thiệu</h2>
                <div class="divider" aria-hidden="true"></div>
                <p class="section-desc">Khám phá các liệu pháp, bí quyết chăm sóc sức khỏe và xu hướng spa mới nhất.
                </p>

                @if ($introPosts->isNotEmpty())
                    @php $postTotal = $introPosts->count(); @endphp
                    <div class="post-slider-wrap" role="region" aria-label="Slider bài viết giới thiệu"
                        aria-roledescription="carousel">

                        {{-- Thông báo live cho screen reader --}}
                        <div id="sliderAnnounce" aria-live="polite" aria-atomic="true" class="sr-only"></div>

                        <div class="post-slider">
                            <div class="post-track" id="postTrack">
                                @foreach ($introPosts as $i => $post)
                                    <article class="post-slide" role="group" aria-roledescription="slide"
                                        aria-label="Bài {{ $i + 1 }} trong số {{ $postTotal }}: {{ $post->title }}"
                                        aria-hidden="{{ $i === 0 ? 'false' : 'true' }}">
                                        <div class="post-slide-img">
                                            @if ($post->image)
                                                <img src="{{ asset('storage/' . $post->image) }}"
                                                    alt="Ảnh minh họa bài viết: {{ $post->title }}">
                                            @else
                                                <div style="width:100%;height:100%;display:flex;align-items:center;justify-content:center;font-size:3.5rem;color:#e8d5b0"
                                                    role="img" aria-label="Không có ảnh minh họa">
                                                    <i class="bi bi-journal-text" aria-hidden="true"></i>
                                                </div>
                                            @endif
                                        </div>
                                        <div class="post-slide-body">
                                            <div class="post-num" aria-hidden="true">Bài viết
                                                {{ str_pad($i + 1, 2, '0', STR_PAD_LEFT) }}</div>
                                            <h3>{{ $post->title }}</h3>
                                            <p>{!! $post->content !!}</p>
                                            <div>
                                                <button class="btn-read-more"
                                                    onclick="openPostModal({{ $i }})"
                                                    aria-label="Xem chi tiết bài: {{ $post->title }}">
                                                    <i class="bi bi-arrow-right-circle" aria-hidden="true"></i>
                                                    Xem chi tiết
                                                </button>
                                            </div>
                                            {{-- Nội dung TinyMCE lưu trong template, không bị escape --}}
                                            <template id="post-content-{{ $i }}">
                                                {!! $post->content !!}
                                            </template>
                                        </div>
                                    </article>
                                @endforeach
                            </div>
                        </div>

                        <div class="post-slider-controls" role="group" aria-label="Điều khiển slider bài viết">
                            <button class="post-slider-btn" id="postPrev" aria-label="Xem bài viết trước">
                                <i class="bi bi-chevron-left" aria-hidden="true"></i>
                            </button>

                            <div class="post-dots" id="postDots" role="tablist" aria-label="Chọn bài viết">
                                @foreach ($introPosts as $i => $post)
                                    <button class="post-dot {{ $i === 0 ? 'active' : '' }}" role="tab"
                                        data-index="{{ $i }}"
                                        aria-label="Bài {{ $i + 1 }}: {{ $post->title }}"
                                        aria-selected="{{ $i === 0 ? 'true' : 'false' }}"
                                        tabindex="{{ $i === 0 ? '0' : '-1' }}"></button>
                                @endforeach
                            </div>

                            <button class="post-slider-btn" id="postNext" aria-label="Xem bài viết tiếp theo">
                                <i class="bi bi-chevron-right" aria-hidden="true"></i>
                            </button>
                        </div>
                    </div>
                @else
                    <div style="text-align:center;padding:60px 0;color:#aaa;" role="status">
                        <i class="bi bi-journal-text"
                            style="font-size:3rem;display:block;margin-bottom:16px;color:#e8d5b0"
                            aria-hidden="true"></i>
                        <p>Bài viết đang được cập nhật.</p>
                    </div>
                @endif
            </div>
        </section>

        {{-- ===== SERVICES ===== --}}
        <section id="services" aria-labelledby="services-heading">
            <div class="section-inner">
                <span class="section-label" aria-hidden="true">Dịch vụ của chúng tôi</span>
                <h2 class="section-title" id="services-heading">Gói Dịch Vụ Nổi Bật</h2>
                <div class="divider" aria-hidden="true"></div>
                <p class="section-desc">Chọn gói dịch vụ phù hợp với nhu cầu — từ thư giãn nhẹ nhàng đến phục hồi
                    chuyên sâu.</p>

                @if ($servicePackages->isNotEmpty())
                    <ul class="services-grid" role="list" aria-label="Danh sách gói dịch vụ">
                        @foreach ($servicePackages as $i => $pkg)
                            <li class="service-card" role="listitem">
                                <div class="service-img">
                                    @if ($pkg->image)
                                        <img src="{{ asset('storage/' . $pkg->image) }}"
                                            alt="Ảnh minh họa dịch vụ {{ $pkg->name }}">
                                    @else
                                        <div class="no-img" role="img" aria-label="Không có ảnh dịch vụ">
                                            <i class="bi bi-flower2" aria-hidden="true"></i>
                                        </div>
                                    @endif
                                </div>
                                <div class="service-body">
                                    <h3>{{ $pkg->name }}</h3>
                                    @if ($pkg->description)
                                        <p class="service-desc-text">{{ $pkg->description }}</p>
                                    @endif
                                    <div class="service-price">
                                        <span class="price"
                                            aria-label="Giá: {{ number_format($pkg->price, 0, ',', '.') }} đồng">
                                            {{ number_format($pkg->price, 0, ',', '.') }}đ
                                        </span>
                                        <a href="#contact" class="btn-book"
                                            aria-label="Liên hệ để đặt lịch dịch vụ {{ $pkg->name }}">
                                            Liên hệ
                                        </a>
                                    </div>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                @else
                    <div style="text-align:center;padding:60px 0;color:#aaa;" role="status">
                        <i class="bi bi-flower2" style="font-size:3rem;display:block;margin-bottom:16px;color:#e8d5b0"
                            aria-hidden="true"></i>
                        <p>Dịch vụ đang được cập nhật. Vui lòng liên hệ để được tư vấn.</p>
                    </div>
                @endif
            </div>
        </section>

        {{-- ===== CONTACT ===== --}}
        @php $cfg = get_config(); @endphp
        <section id="contact" class="contact-section" aria-labelledby="contact-heading">
            <div class="contact-wrap">

                {{-- Cột trái: thông tin --}}
                <div class="contact-left">
                    <span class="contact-eyebrow" aria-hidden="true">Liên hệ với chúng tôi</span>
                    <h2 id="contact-heading">Luôn Sẵn Sàng<br>Phục Vụ Bạn</h2>
                    <p class="contact-sub">Đội ngũ của chúng tôi luôn sẵn sàng tư vấn và hỗ trợ bạn mọi lúc.</p>

                    {{-- Hotline nổi bật --}}
                    @if ($cfg->hotline ?? false)
                        <a href="tel:{{ preg_replace('/\s+/', '', $cfg->hotline) }}" class="contact-cta-phone"
                            aria-label="Gọi hotline {{ $cfg->hotline }}">
                            <span class="contact-cta-icon" aria-hidden="true">
                                <i class="bi bi-telephone-fill"></i>
                            </span>
                            <span>
                                <span class="contact-cta-label">Gọi ngay hotline</span>
                                <span class="contact-cta-number">{{ $cfg->hotline }}</span>
                            </span>
                        </a>
                    @endif

                    {{-- Thông tin phụ --}}
                    <ul class="contact-info-list" aria-label="Thông tin liên hệ">
                        @if ($cfg->address ?? false)
                            <li>
                                <span class="ci-icon" aria-hidden="true"><i class="bi bi-geo-alt-fill"></i></span>
                                <span>
                                    <span class="ci-label">Địa chỉ</span>
                                    <address style="font-style:normal">{{ $cfg->address }}</address>
                                </span>
                            </li>
                        @endif
                        @if ($cfg->email ?? false)
                            <li>
                                <span class="ci-icon" aria-hidden="true"><i class="bi bi-envelope-fill"></i></span>
                                <span>
                                    <span class="ci-label">Email</span>
                                    <a href="mailto:{{ $cfg->email }}"
                                        aria-label="Gửi email đến {{ $cfg->email }}">{{ $cfg->email }}</a>
                                </span>
                            </li>
                        @endif
                        <li>
                            <span class="ci-icon" aria-hidden="true"><i class="bi bi-clock-fill"></i></span>
                            <span>
                                <span class="ci-label">Giờ hoạt động</span>
                                <span>Thứ 2 – Chủ nhật: 9:00 – 22:00</span>
                            </span>
                        </li>
                    </ul>

                    {{-- Mạng xã hội --}}
                    @if ($socialLinks->isNotEmpty())
                        <nav aria-label="Mạng xã hội" class="contact-socials">
                            @foreach ($socialLinks as $social)
                                <a href="{{ $social->url }}" target="_blank" rel="noopener noreferrer"
                                    aria-label="{{ $social->label }} (mở tab mới)" class="csoc-btn">
                                    <img src="{{ asset('storage/' . $social->icon) }}" alt="{{ $social->label }}"
                                        width="20" height="20" style="object-fit:contain" aria-hidden="true">
                                    <span>{{ $social->label }}</span>
                                </a>
                            @endforeach
                        </nav>
                    @endif
                </div>

                {{-- Cột phải: bản đồ --}}
                <div class="contact-right">
                    @if ($cfg->google_map_embed ?? false)
                        <div class="contact-map" role="region" aria-label="Bản đồ vị trí cửa hàng">
                            {!! $cfg->google_map_embed !!}
                        </div>
                    @else
                        <div class="contact-map-placeholder" aria-hidden="true">
                            <i class="bi bi-map" style="font-size:3rem;color:rgba(255,255,255,.2)"></i>
                            <p style="color:rgba(255,255,255,.3);margin-top:12px">Bản đồ đang cập nhật</p>
                        </div>
                    @endif
                </div>

            </div>
        </section>

    </main>

    {{-- ===== POST MODAL ===== --}}
    <div id="postModal" class="post-modal" role="dialog" aria-modal="true" aria-labelledby="modalTitle"
        aria-hidden="true">
        <div class="post-modal-backdrop" onclick="closePostModal()"></div>
        <div class="post-modal-box">
            <button class="post-modal-close" onclick="closePostModal()" aria-label="Đóng">
                <i class="bi bi-x-lg" aria-hidden="true"></i>
            </button>
            <div class="post-modal-img" id="modalImgWrap" style="display:none">
                <img id="modalImg" src="" alt="">
            </div>
            <div class="post-modal-body">
                <h2 id="modalTitle"></h2>
                <div id="modalContent" class="post-modal-content"></div>
            </div>
        </div>
    </div>

    {{-- ===== FOOTER ===== --}}
    <footer class="spa-footer" role="contentinfo">
        <div class="footer-inner">
            <div class="footer-grid">
                <div class="footer-brand">
                    <div class="logo" aria-label="Spa Massage">Spa <span>Massage</span></div>
                    <p>Nơi bạn tìm lại sự cân bằng — thư giãn thân tâm, phục hồi năng lượng với những liệu trình chăm
                        sóc đẳng cấp.</p>
                    @if ($socialLinks->isNotEmpty())
                    <nav aria-label="Mạng xã hội footer">
                        <div class="footer-socials">
                            @foreach ($socialLinks as $social)
                                <a href="{{ $social->url }}" target="_blank" rel="noopener noreferrer"
                                    aria-label="{{ $social->label }} (mở tab mới)">
                                    <img src="{{ asset('storage/' . $social->icon) }}" alt="{{ $social->label }}"
                                        width="18" height="18" style="object-fit:contain" aria-hidden="true">
                                </a>
                            @endforeach
                        </div>
                    </nav>
                    @endif
                </div>

                <nav aria-label="Điều hướng footer">
                    <div class="footer-col">
                        <h2 class="footer-col-heading">Điều hướng</h2>
                        <ul>
                            <li><a href="#home">Trang chủ</a></li>
                            <li><a href="#posts">Giới thiệu</a></li>
                            <li><a href="#services">Dịch vụ</a></li>
                            <li><a href="#contact">Liên hệ</a></li>
                        </ul>
                    </div>
                </nav>

                <div class="footer-col">
                    <h2 class="footer-col-heading">Liên hệ</h2>
                    <ul>
                        @if ($cfg->hotline ?? false)
                            <li>
                                <a href="tel:{{ preg_replace('/\s+/', '', $cfg->hotline) }}"
                                    aria-label="Gọi hotline {{ $cfg->hotline }}">
                                    {{ $cfg->hotline }}
                                </a>
                            </li>
                        @endif
                        @if ($cfg->email ?? false)
                            <li>
                                <a href="mailto:{{ $cfg->email }}" aria-label="Gửi email đến {{ $cfg->email }}">
                                    {{ $cfg->email }}
                                </a>
                            </li>
                        @endif
                        @if ($cfg->address ?? false)
                            <li>{{ Str::limit($cfg->address, 40) }}</li>
                        @endif
                    </ul>
                </div>
            </div>

            <div class="footer-bottom">
                <p>&copy; {{ date('Y') }} Spa Massage. Tất cả quyền được bảo lưu.</p>
            </div>
        </div>
    </footer>

    {{-- ===== FLOATING CONTACT BUTTONS ===== --}}
    <div class="floating-contact">
        @if ($cfg->hotline ?? false)
            <a href="tel:+{{ $cfg->hotline }}" class="floating-btn btn-phone" aria-label="Gọi hotline">
                <i class="bi bi-telephone-fill"></i>
                <span class="btn-label">Hotline: {{ $cfg->hotline }}</span>
            </a>
        @endif

        @foreach ($socialLinks as $social)
            <a href="{{ $social->url }}" target="_blank" rel="noopener noreferrer"
                class="floating-btn" aria-label="{{ $social->label }}"
                style="background:{{ $social->color }}">
                <img src="{{ asset('storage/' . $social->icon) }}" alt="{{ $social->label }}"
                    width="24" height="24" style="object-fit:contain">
                <span class="btn-label">{{ $social->label }}</span>
            </a>
        @endforeach
    </div>

    <script>
        // Header scroll effect
        const header = document.getElementById('spaHeader');
        window.addEventListener('scroll', () => {
            header.classList.toggle('scrolled', window.scrollY > 20);
        });

        // Mobile nav toggle
        function toggleNav(btn) {
            const nav = document.getElementById('navLinks');
            const isOpen = nav.classList.toggle('open');
            btn.setAttribute('aria-expanded', isOpen);
            btn.setAttribute('aria-label', isOpen ? 'Đóng menu điều hướng' : 'Mở menu điều hướng');
        }

        // Close nav on link click or Escape
        document.querySelectorAll('.nav-links a').forEach(a => {
            a.addEventListener('click', () => {
                const nav = document.getElementById('navLinks');
                const btn = document.getElementById('navToggle');
                nav.classList.remove('open');
                btn.setAttribute('aria-expanded', 'false');
                btn.setAttribute('aria-label', 'Mở menu điều hướng');
            });
        });
        document.addEventListener('keydown', e => {
            if (e.key === 'Escape') {
                const nav = document.getElementById('navLinks');
                const btn = document.getElementById('navToggle');
                if (nav.classList.contains('open')) {
                    nav.classList.remove('open');
                    btn.setAttribute('aria-expanded', 'false');
                    btn.setAttribute('aria-label', 'Mở menu điều hướng');
                    btn.focus();
                }
            }
        });

        // Post modal
        function openPostModal(index) {
            const modal = document.getElementById('postModal');
            const imgWrap = document.getElementById('modalImgWrap');
            const img = document.getElementById('modalImg');
            const title = document.getElementById('modalTitle');
            const content = document.getElementById('modalContent');

            const slide = document.querySelectorAll('.post-slide')[index];
            const tpl = document.getElementById('post-content-' + index);
            const h3 = slide.querySelector('h3');
            const slideImg = slide.querySelector('.post-slide-img img');

            title.textContent = h3 ? h3.textContent : '';
            content.innerHTML = tpl ? tpl.innerHTML : '';

            if (slideImg) {
                img.src = slideImg.src;
                img.alt = slideImg.alt;
                imgWrap.style.display = 'block';
            } else {
                imgWrap.style.display = 'none';
            }

            modal.setAttribute('aria-hidden', 'false');
            modal.classList.add('open');
            document.body.style.overflow = 'hidden';

            setTimeout(() => modal.querySelector('.post-modal-close').focus(), 50);
        }

        function closePostModal() {
            const modal = document.getElementById('postModal');
            modal.classList.remove('open');
            modal.setAttribute('aria-hidden', 'true');
            document.body.style.overflow = '';
        }

        document.addEventListener('keydown', e => {
            if (e.key === 'Escape') closePostModal();
        });

        // Post slider
        (function() {
            const track = document.getElementById('postTrack');
            if (!track) return;

            const slides = Array.from(track.querySelectorAll('.post-slide'));
            const dots = Array.from(document.querySelectorAll('#postDots .post-dot'));
            const announce = document.getElementById('sliderAnnounce');
            const total = slides.length;
            let current = 0;
            let timer;

            function goTo(index) {
                current = (index + total) % total;
                track.style.transform = `translateX(-${current * 100}%)`;

                // ARIA cập nhật từng slide
                slides.forEach((s, i) => s.setAttribute('aria-hidden', i !== current ? 'true' : 'false'));

                // Cập nhật dots
                dots.forEach((d, i) => {
                    d.classList.toggle('active', i === current);
                    d.setAttribute('aria-selected', i === current ? 'true' : 'false');
                    d.setAttribute('tabindex', i === current ? '0' : '-1');
                });

                // Thông báo screen reader
                const title = slides[current].querySelector('h3');
                if (announce && title) {
                    announce.textContent = `Bài ${current + 1} trong ${total}: ${title.textContent}`;
                }
            }

            document.getElementById('postPrev').addEventListener('click', () => {
                goTo(current - 1);
                resetTimer();
            });
            document.getElementById('postNext').addEventListener('click', () => {
                goTo(current + 1);
                resetTimer();
            });
            dots.forEach(d => d.addEventListener('click', () => {
                goTo(+d.dataset.index);
                resetTimer();
            }));

            // Keyboard navigation cho dots
            dots.forEach((d, i) => {
                d.addEventListener('keydown', e => {
                    if (e.key === 'ArrowRight' || e.key === 'ArrowDown') {
                        e.preventDefault();
                        goTo(i + 1);
                        dots[current].focus();
                        resetTimer();
                    } else if (e.key === 'ArrowLeft' || e.key === 'ArrowUp') {
                        e.preventDefault();
                        goTo(i - 1);
                        dots[current].focus();
                        resetTimer();
                    } else if (e.key === 'Home') {
                        e.preventDefault();
                        goTo(0);
                        dots[0].focus();
                        resetTimer();
                    } else if (e.key === 'End') {
                        e.preventDefault();
                        goTo(total - 1);
                        dots[total - 1].focus();
                        resetTimer();
                    }
                });
            });

            // Keyboard prev/next buttons
            document.getElementById('postPrev').addEventListener('keydown', e => {
                if (e.key === 'Enter' || e.key === ' ') {
                    e.preventDefault();
                    goTo(current - 1);
                    resetTimer();
                }
            });
            document.getElementById('postNext').addEventListener('keydown', e => {
                if (e.key === 'Enter' || e.key === ' ') {
                    e.preventDefault();
                    goTo(current + 1);
                    resetTimer();
                }
            });

            // Swipe support
            let startX = 0;
            track.addEventListener('touchstart', e => {
                startX = e.touches[0].clientX;
            }, {
                passive: true
            });
            track.addEventListener('touchend', e => {
                const diff = startX - e.changedTouches[0].clientX;
                if (Math.abs(diff) > 50) {
                    goTo(diff > 0 ? current + 1 : current - 1);
                    resetTimer();
                }
            });

            // Tạm dừng auto-play khi focus vào slider
            const sliderWrap = track.closest('[role="region"]');
            sliderWrap.addEventListener('focusin', () => clearInterval(timer));
            sliderWrap.addEventListener('focusout', () => resetTimer());
            sliderWrap.addEventListener('mouseenter', () => clearInterval(timer));
            sliderWrap.addEventListener('mouseleave', () => resetTimer());

            function resetTimer() {
                clearInterval(timer);
                timer = setInterval(() => goTo(current + 1), 5000);
            }
            resetTimer();
        })();
    </script>
</body>

</html>
