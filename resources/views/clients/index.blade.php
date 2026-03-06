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
    <link rel="icon" type="image/png" sizes="192x192" href="{{ asset('/icons/android-chrome-192x192.png') }}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('/icons/apple-touch-icon.png') }}">

    {{-- Open Graph --}}
    <meta property="og:type" content="website">
    <meta property="og:locale" content="vi_VN">
    <meta property="og:site_name" content="{{ get_config()->meta_title ?? 'Spa Massage' }}">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:title" content="{{ get_config()->meta_title ?? 'Spa Massage Thư Giãn - Liệu Pháp Phục Hồi Sức Khỏe Toàn Diện' }}">
    <meta property="og:description" content="{{ get_config()->meta_description ?? 'Trải nghiệm dịch vụ spa & massage chuyên nghiệp tại TP. Hồ Chí Minh.' }}">
    <meta property="og:image" content="{{ asset('/icons/512x512.png') }}">

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

        <button class="nav-toggle" id="navToggle"
            aria-label="Mở menu điều hướng"
            aria-expanded="false"
            aria-controls="navLinks"
            onclick="toggleNav(this)">
            <span aria-hidden="true"></span>
            <span aria-hidden="true"></span>
            <span aria-hidden="true"></span>
        </button>
    </div>
</header>

{{-- ===== MAIN CONTENT ===== --}}
<main id="main-content" tabindex="-1">

{{-- ===== HERO ===== --}}
<section class="hero" id="home" aria-labelledby="hero-heading">
    <div class="hero-content">
        <div class="hero-badge" aria-hidden="true">Chào mừng đến với chúng tôi</div>
        <h1 id="hero-heading">Phục Hồi Sức Khỏe<br><em>Toàn Diện & Thư Giãn</em></h1>
        <p>Trải nghiệm liệu pháp spa & massage chuyên nghiệp — nơi không gian yên tĩnh và bàn tay lành nghề giúp bạn tìm lại cân bằng.</p>
        <div class="hero-btns">
            <a href="#services" class="btn-gold">Khám phá dịch vụ</a>
            <a href="#posts" class="btn-outline-gold">Tìm hiểu thêm</a>
        </div>
    </div>
    <div class="hero-scroll" aria-hidden="true">
        <span>Cuộn xuống</span>
        <i class="bi bi-chevron-down"></i>
    </div>
</section>

{{-- ===== INTRO POSTS SLIDER ===== --}}
<section class="posts-section" id="posts" aria-labelledby="posts-heading">
    <div class="section-inner">
        <span class="section-label" aria-hidden="true">Giới thiệu</span>
        <h2 class="section-title" id="posts-heading">Bài Viết Giới Thiệu</h2>
        <div class="divider" aria-hidden="true"></div>
        <p class="section-desc">Khám phá các liệu pháp, bí quyết chăm sóc sức khỏe và xu hướng spa mới nhất.</p>

        @if($introPosts->isNotEmpty())
        @php $postTotal = $introPosts->count(); @endphp
        <div class="post-slider-wrap"
            role="region"
            aria-label="Slider bài viết giới thiệu"
            aria-roledescription="carousel">

            {{-- Thông báo live cho screen reader --}}
            <div id="sliderAnnounce" aria-live="polite" aria-atomic="true" class="sr-only"></div>

            <div class="post-slider">
                <div class="post-track" id="postTrack">
                    @foreach($introPosts as $i => $post)
                    <article class="post-slide"
                        role="group"
                        aria-roledescription="slide"
                        aria-label="Bài {{ $i + 1 }} trong số {{ $postTotal }}: {{ $post->title }}"
                        aria-hidden="{{ $i === 0 ? 'false' : 'true' }}">
                        <div class="post-slide-img">
                            @if($post->image)
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
                            <div class="post-num" aria-hidden="true">Bài viết {{ str_pad($i + 1, 2, '0', STR_PAD_LEFT) }}</div>
                            <h3>{{ $post->title }}</h3>
                            <p>{{ strip_tags($post->content) }}</p>
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
                <button class="post-slider-btn" id="postPrev"
                    aria-label="Xem bài viết trước">
                    <i class="bi bi-chevron-left" aria-hidden="true"></i>
                </button>

                <div class="post-dots" id="postDots" role="tablist" aria-label="Chọn bài viết">
                    @foreach($introPosts as $i => $post)
                    <button class="post-dot {{ $i === 0 ? 'active' : '' }}"
                        role="tab"
                        data-index="{{ $i }}"
                        aria-label="Bài {{ $i + 1 }}: {{ $post->title }}"
                        aria-selected="{{ $i === 0 ? 'true' : 'false' }}"
                        tabindex="{{ $i === 0 ? '0' : '-1' }}"></button>
                    @endforeach
                </div>

                <button class="post-slider-btn" id="postNext"
                    aria-label="Xem bài viết tiếp theo">
                    <i class="bi bi-chevron-right" aria-hidden="true"></i>
                </button>
            </div>
        </div>
        @else
        <div style="text-align:center;padding:60px 0;color:#aaa;" role="status">
            <i class="bi bi-journal-text" style="font-size:3rem;display:block;margin-bottom:16px;color:#e8d5b0" aria-hidden="true"></i>
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
        <p class="section-desc">Chọn gói dịch vụ phù hợp với nhu cầu — từ thư giãn nhẹ nhàng đến phục hồi chuyên sâu.</p>

        @if($servicePackages->isNotEmpty())
        <ul class="services-grid" role="list" aria-label="Danh sách gói dịch vụ">
            @foreach($servicePackages as $pkg)
            <li class="service-card" role="listitem">
                <div class="service-img">
                    @if($pkg->image)
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
                    <div class="service-price">
                        <span class="price" aria-label="Giá: {{ number_format($pkg->price, 0, ',', '.') }} đồng">
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
            <i class="bi bi-flower2" style="font-size:3rem;display:block;margin-bottom:16px;color:#e8d5b0" aria-hidden="true"></i>
            <p>Dịch vụ đang được cập nhật. Vui lòng liên hệ để được tư vấn.</p>
        </div>
        @endif
    </div>
</section>

{{-- ===== CONTACT ===== --}}
<section id="contact" aria-labelledby="contact-heading">
    <div class="section-inner">
        <span class="section-label" aria-hidden="true">Liên hệ với chúng tôi</span>
        <h2 class="section-title" id="contact-heading">Thông Tin Liên Hệ</h2>
        <div class="divider" aria-hidden="true"></div>
        <p class="section-desc">Liên hệ với chúng tôi để được hỗ trợ và tư vấn trực tiếp.</p>

        @php $cfg = get_config(); @endphp

        <ul style="display:grid;grid-template-columns:repeat(auto-fit,minmax(240px,1fr));gap:28px;max-width:900px;margin:0 auto;list-style:none;padding:0"
            aria-label="Thông tin liên hệ">

            <li class="contact-item" style="background:var(--light);padding:24px;border-radius:var(--radius)">
                <div class="contact-icon" aria-hidden="true"><i class="bi bi-geo-alt-fill"></i></div>
                <div>
                    <div class="lbl" id="lbl-addr">Địa chỉ</div>
                    <address class="val" aria-labelledby="lbl-addr" style="font-style:normal">
                        {{ $cfg->address ?? '123 Đường Nguyễn Thị Minh Khai, Quận 3, TP. Hồ Chí Minh' }}
                    </address>
                </div>
            </li>

            <li class="contact-item" style="background:var(--light);padding:24px;border-radius:var(--radius)">
                <div class="contact-icon" aria-hidden="true"><i class="bi bi-telephone-fill"></i></div>
                <div>
                    <div class="lbl" id="lbl-phone">Hotline</div>
                    <div class="val">
                        <a href="tel:{{ preg_replace('/\s+/', '', $cfg->hotline ?? '0909123456') }}"
                            aria-labelledby="lbl-phone"
                            aria-label="Gọi hotline {{ $cfg->hotline ?? '0909 123 456' }}">
                            {{ $cfg->hotline ?? '0909 123 456' }}
                        </a>
                    </div>
                </div>
            </li>

            <li class="contact-item" style="background:var(--light);padding:24px;border-radius:var(--radius)">
                <div class="contact-icon" aria-hidden="true"><i class="bi bi-envelope-fill"></i></div>
                <div>
                    <div class="lbl" id="lbl-email">Email</div>
                    <div class="val">
                        <a href="mailto:{{ $cfg->email ?? 'lienhe@spamassage.vn' }}"
                            aria-label="Gửi email đến {{ $cfg->email ?? 'lienhe@spamassage.vn' }}">
                            {{ $cfg->email ?? 'lienhe@spamassage.vn' }}
                        </a>
                    </div>
                </div>
            </li>

            <li class="contact-item" style="background:var(--light);padding:24px;border-radius:var(--radius)">
                <div class="contact-icon" aria-hidden="true"><i class="bi bi-clock-fill"></i></div>
                <div>
                    <div class="lbl">Giờ hoạt động</div>
                    <div class="val">Thứ 2 – Chủ nhật: 9:00 – 22:00</div>
                </div>
            </li>

        </ul>

        @if($cfg->facebook_url || $cfg->zalo_url || $cfg->instagram_url)
        <nav aria-label="Mạng xã hội" style="display:flex;gap:12px;justify-content:center;margin-top:32px">
            @if($cfg->facebook_url)
            <a href="{{ $cfg->facebook_url }}" target="_blank" rel="noopener noreferrer"
                aria-label="Trang Facebook của chúng tôi (mở tab mới)"
                style="width:46px;height:46px;border-radius:50%;background:var(--light);border:1px solid #e8d5b0;display:flex;align-items:center;justify-content:center;color:var(--gold);font-size:1.2rem;transition:.2s">
                <i class="bi bi-facebook" aria-hidden="true"></i>
            </a>
            @endif
            @if($cfg->zalo_url)
            <a href="{{ $cfg->zalo_url }}" target="_blank" rel="noopener noreferrer"
                aria-label="Nhắn tin Zalo với chúng tôi (mở tab mới)"
                style="width:46px;height:46px;border-radius:50%;background:var(--light);border:1px solid #e8d5b0;display:flex;align-items:center;justify-content:center;color:var(--gold);font-size:1.2rem;transition:.2s">
                <i class="bi bi-chat-dots-fill" aria-hidden="true"></i>
            </a>
            @endif
            @if($cfg->instagram_url)
            <a href="{{ $cfg->instagram_url }}" target="_blank" rel="noopener noreferrer"
                aria-label="Trang Instagram của chúng tôi (mở tab mới)"
                style="width:46px;height:46px;border-radius:50%;background:var(--light);border:1px solid #e8d5b0;display:flex;align-items:center;justify-content:center;color:var(--gold);font-size:1.2rem;transition:.2s">
                <i class="bi bi-instagram" aria-hidden="true"></i>
            </a>
            @endif
        </nav>
        @endif

        @if($cfg->google_map_embed)
        <div style="margin-top:40px;border-radius:var(--radius);overflow:hidden;box-shadow:var(--shadow)"
            role="region" aria-label="Bản đồ vị trí cửa hàng">
            {!! $cfg->google_map_embed !!}
        </div>
        @endif
    </div>
</section>

</main>

{{-- ===== POST MODAL ===== --}}
<div id="postModal" class="post-modal" role="dialog" aria-modal="true" aria-labelledby="modalTitle" aria-hidden="true">
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
                <p>Nơi bạn tìm lại sự cân bằng — thư giãn thân tâm, phục hồi năng lượng với những liệu trình chăm sóc đẳng cấp.</p>
                <nav aria-label="Mạng xã hội footer">
                    <div class="footer-socials">
                        @if($cfg->facebook_url ?? false)
                        <a href="{{ $cfg->facebook_url }}" target="_blank" rel="noopener noreferrer"
                            aria-label="Facebook (mở tab mới)">
                            <i class="bi bi-facebook" aria-hidden="true"></i>
                        </a>
                        @endif
                        @if($cfg->instagram_url ?? false)
                        <a href="{{ $cfg->instagram_url }}" target="_blank" rel="noopener noreferrer"
                            aria-label="Instagram (mở tab mới)">
                            <i class="bi bi-instagram" aria-hidden="true"></i>
                        </a>
                        @endif
                        @if($cfg->youtube_url ?? false)
                        <a href="{{ $cfg->youtube_url }}" target="_blank" rel="noopener noreferrer"
                            aria-label="YouTube (mở tab mới)">
                            <i class="bi bi-youtube" aria-hidden="true"></i>
                        </a>
                        @endif
                        @if($cfg->tiktok_url ?? false)
                        <a href="{{ $cfg->tiktok_url }}" target="_blank" rel="noopener noreferrer"
                            aria-label="TikTok (mở tab mới)">
                            <i class="bi bi-tiktok" aria-hidden="true"></i>
                        </a>
                        @endif
                        @if($cfg->zalo_url ?? false)
                        <a href="{{ $cfg->zalo_url }}" target="_blank" rel="noopener noreferrer"
                            aria-label="Zalo (mở tab mới)">
                            <i class="bi bi-chat-dots-fill" aria-hidden="true"></i>
                        </a>
                        @endif
                    </div>
                </nav>
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
                    @if($cfg->hotline ?? false)
                    <li>
                        <a href="tel:{{ preg_replace('/\s+/', '', $cfg->hotline) }}"
                            aria-label="Gọi hotline {{ $cfg->hotline }}">
                            {{ $cfg->hotline }}
                        </a>
                    </li>
                    @endif
                    @if($cfg->email ?? false)
                    <li>
                        <a href="mailto:{{ $cfg->email }}"
                            aria-label="Gửi email đến {{ $cfg->email }}">
                            {{ $cfg->email }}
                        </a>
                    </li>
                    @endif
                    @if($cfg->address ?? false)
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

<script>
// Header scroll effect
const header = document.getElementById('spaHeader');
window.addEventListener('scroll', () => {
    header.classList.toggle('scrolled', window.scrollY > 20);
});

// Mobile nav toggle
function toggleNav(btn) {
    const nav     = document.getElementById('navLinks');
    const isOpen  = nav.classList.toggle('open');
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
    const modal   = document.getElementById('postModal');
    const imgWrap = document.getElementById('modalImgWrap');
    const img     = document.getElementById('modalImg');
    const title   = document.getElementById('modalTitle');
    const content = document.getElementById('modalContent');

    const slide    = document.querySelectorAll('.post-slide')[index];
    const tpl      = document.getElementById('post-content-' + index);
    const h3       = slide.querySelector('h3');
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
(function () {
    const track    = document.getElementById('postTrack');
    if (!track) return;

    const slides   = Array.from(track.querySelectorAll('.post-slide'));
    const dots     = Array.from(document.querySelectorAll('#postDots .post-dot'));
    const announce = document.getElementById('sliderAnnounce');
    const total    = slides.length;
    let current    = 0;
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

    document.getElementById('postPrev').addEventListener('click', () => { goTo(current - 1); resetTimer(); });
    document.getElementById('postNext').addEventListener('click', () => { goTo(current + 1); resetTimer(); });
    dots.forEach(d => d.addEventListener('click', () => { goTo(+d.dataset.index); resetTimer(); }));

    // Keyboard navigation cho dots
    dots.forEach((d, i) => {
        d.addEventListener('keydown', e => {
            if (e.key === 'ArrowRight' || e.key === 'ArrowDown') {
                e.preventDefault(); goTo(i + 1); dots[current].focus(); resetTimer();
            } else if (e.key === 'ArrowLeft' || e.key === 'ArrowUp') {
                e.preventDefault(); goTo(i - 1); dots[current].focus(); resetTimer();
            } else if (e.key === 'Home') {
                e.preventDefault(); goTo(0); dots[0].focus(); resetTimer();
            } else if (e.key === 'End') {
                e.preventDefault(); goTo(total - 1); dots[total - 1].focus(); resetTimer();
            }
        });
    });

    // Keyboard prev/next buttons
    document.getElementById('postPrev').addEventListener('keydown', e => {
        if (e.key === 'Enter' || e.key === ' ') { e.preventDefault(); goTo(current - 1); resetTimer(); }
    });
    document.getElementById('postNext').addEventListener('keydown', e => {
        if (e.key === 'Enter' || e.key === ' ') { e.preventDefault(); goTo(current + 1); resetTimer(); }
    });

    // Swipe support
    let startX = 0;
    track.addEventListener('touchstart', e => { startX = e.touches[0].clientX; }, { passive: true });
    track.addEventListener('touchend', e => {
        const diff = startX - e.changedTouches[0].clientX;
        if (Math.abs(diff) > 50) { goTo(diff > 0 ? current + 1 : current - 1); resetTimer(); }
    });

    // Tạm dừng auto-play khi focus vào slider
    const sliderWrap = track.closest('[role="region"]');
    sliderWrap.addEventListener('focusin', () => clearInterval(timer));
    sliderWrap.addEventListener('focusout', () => resetTimer());
    sliderWrap.addEventListener('mouseenter', () => clearInterval(timer));
    sliderWrap.addEventListener('mouseleave', () => resetTimer());

    function resetTimer() { clearInterval(timer); timer = setInterval(() => goTo(current + 1), 5000); }
    resetTimer();
})();
</script>
</body>
</html>
