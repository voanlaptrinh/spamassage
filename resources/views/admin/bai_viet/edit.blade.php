@extends('admin.index')
@section('contentadmin')

<div class="pagetitle">
    <h1>Sửa bài viết giới thiệu</h1>
    <nav><ol class="breadcrumb mb-0">
        <li class="breadcrumb-item text-muted">Admin</li>
        <li class="breadcrumb-item"><a href="{{ route('admin.bai_viet.index') }}">Bài viết giới thiệu</a></li>
        <li class="breadcrumb-item active">Sửa</li>
    </ol></nav>
</div>

<form action="{{ route('admin.bai_viet.update', $item) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div class="row g-3">

        {{-- Cột trái --}}
        <div class="col-lg-8 d-flex flex-column gap-3">

            {{-- Nội dung --}}
            <div class="card border-0 shadow-sm">
                <div class="card-header bg-white border-bottom py-3 d-flex align-items-center gap-2">
                    <span class="rounded-2 p-1 px-2" style="background:#eff6ff">
                        <i class="bi bi-file-earmark-text-fill text-primary"></i>
                    </span>
                    <span class="fw-semibold">Nội dung bài viết</span>
                </div>
                <div class="card-body py-4">

                    <div class="mb-4">
                        <label class="form-label fw-semibold mb-1">
                            Tiêu đề <span class="text-danger">*</span>
                        </label>
                        <input type="text" name="title"
                            class="form-control form-control-lg @error('title') is-invalid @enderror"
                            value="{{ old('title', $item->title) }}"
                            placeholder="Nhập tiêu đề bài viết giới thiệu">
                        @error('title')
                            <div class="invalid-feedback d-flex align-items-center gap-1">
                                <i class="bi bi-exclamation-circle-fill"></i> {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="mb-0">
                        <label class="form-label fw-semibold mb-1">
                            Nội dung <span class="text-danger">*</span>
                        </label>
                        <textarea name="content" id="tyni"
                            class="form-control @error('content') is-invalid @enderror"
                            rows="12" placeholder="Nhập nội dung bài viết...">{{ old('content', $item->content) }}</textarea>
                        @error('content')
                            <div class="invalid-feedback d-flex align-items-center gap-1">
                                <i class="bi bi-exclamation-circle-fill"></i> {{ $message }}
                            </div>
                        @enderror
                    </div>

                </div>
            </div>

            {{-- SEO --}}
            <div class="card border-0 shadow-sm">
                <div class="card-header bg-white border-bottom py-3 d-flex align-items-center gap-2">
                    <span class="rounded-2 p-1 px-2" style="background:#f0fdf4">
                        <i class="bi bi-search text-success"></i>
                    </span>
                    <span class="fw-semibold">Cài đặt SEO</span>
                </div>
                <div class="card-body py-4">

                    <div class="mb-4">
                        <label class="form-label fw-semibold mb-1">Meta Title</label>
                        <input type="text" name="meta_title" id="metaTitleInput"
                            class="form-control @error('meta_title') is-invalid @enderror"
                            value="{{ old('meta_title', $item->meta_title) }}" maxlength="255"
                            placeholder="Tiêu đề hiển thị trên kết quả Google">
                        <div class="d-flex justify-content-between mt-1">
                            <small class="text-muted">Khuyến nghị dưới 60 ký tự</small>
                            <small id="metaTitleCount" class="text-muted">0 / 255</small>
                        </div>
                        @error('meta_title')
                            <div class="invalid-feedback d-flex align-items-center gap-1">
                                <i class="bi bi-exclamation-circle-fill"></i> {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div>
                        <label class="form-label fw-semibold mb-1">Meta Description</label>
                        <textarea name="meta_description" id="metaDescInput"
                            class="form-control @error('meta_description') is-invalid @enderror"
                            rows="3" maxlength="1000"
                            placeholder="Mô tả ngắn hiển thị dưới tiêu đề trên Google">{{ old('meta_description', $item->meta_description) }}</textarea>
                        <div class="d-flex justify-content-between mt-1">
                            <small class="text-muted">Khuyến nghị dưới 160 ký tự</small>
                            <small id="metaDescCount" class="text-muted">0 / 1000</small>
                        </div>
                        @error('meta_description')
                            <div class="invalid-feedback d-flex align-items-center gap-1">
                                <i class="bi bi-exclamation-circle-fill"></i> {{ $message }}
                            </div>
                        @enderror
                    </div>

                </div>
            </div>
        </div>

        {{-- Cột phải --}}
        <div class="col-lg-4">
            <div class="d-flex flex-column gap-3 sticky-top" style="top:80px">

                {{-- Trạng thái + Lưu --}}
                <div class="card border-0 shadow-sm">
                    <div class="card-header bg-white border-bottom py-3 d-flex align-items-center gap-2">
                        <span class="rounded-2 p-1 px-2" style="background:#fdf4ff">
                            <i class="bi bi-toggle-on" style="color:#9333ea"></i>
                        </span>
                        <span class="fw-semibold">Xuất bản</span>
                    </div>
                    <div class="card-body py-3">
                        <div class="p-3 rounded-3 d-flex align-items-center justify-content-between gap-3"
                            style="background:#f8fafc;border:1px solid #e2e8f0">
                            <div>
                                <div class="fw-semibold text-dark">Hiển thị bài viết</div>
                                <small class="text-muted">Bật để bài viết hiển thị trên website</small>
                            </div>
                            <div class="form-check form-switch mb-0">
                                <input class="form-check-input" type="checkbox" name="is_active" value="1"
                                    id="isActive" role="switch" style="width:3em;height:1.5em;cursor:pointer"
                                    {{ old('is_active', $item->is_active) ? 'checked' : '' }}>
                            </div>
                        </div>
                    </div>
                    <div class="card-body py-3 border-top">
                        <label class="form-label fw-semibold mb-1">
                            <i class="bi bi-sort-numeric-up me-1 text-muted"></i>Thứ tự hiển thị
                        </label>
                        <input type="number" name="sort_order" min="0"
                            class="form-control"
                            value="{{ old('sort_order', $item->sort_order) }}"
                            placeholder="0">
                        <small class="text-muted">Số nhỏ hơn hiển thị trước. Mặc định: 0</small>
                    </div>
                    <div class="card-footer bg-white border-top py-3 d-flex gap-2 justify-content-end">
                        <a href="{{ route('admin.bai_viet.index') }}" class="btn btn-outline-secondary px-3">
                            <i class="bi bi-arrow-left me-1"></i>Hủy
                        </a>
                        <button type="submit" class="btn btn-primary px-4">
                            <i class="bi bi-save me-1"></i>Cập nhật
                        </button>
                    </div>
                </div>

                {{-- Ảnh --}}
                <div class="card border-0 shadow-sm">
                    <div class="card-header bg-white border-bottom py-3 d-flex align-items-center gap-2">
                        <span class="rounded-2 p-1 px-2" style="background:#fffbeb">
                            <i class="bi bi-image-fill text-warning"></i>
                        </span>
                        <span class="fw-semibold">Hình ảnh minh họa</span>
                    </div>
                    <div class="card-body">

                        <input type="hidden" name="remove_image" id="removeImageFlag" value="0">

                        {{-- Ảnh hiện tại --}}
                        @if($item->image)
                        <div id="currentWrap" class="mb-3">
                            <img src="{{ asset($item->image) }}" alt="{{ $item->title }}"
                                class="w-100 rounded-3 border" style="object-fit:cover;max-height:180px;">
                            <div class="mt-2 d-flex align-items-center justify-content-between">
                                <small class="text-muted d-flex align-items-center gap-1">
                                    <i class="bi bi-check-circle-fill text-success"></i> Ảnh hiện tại
                                </small>
                                <div class="d-flex gap-1">
                                    <button type="button" onclick="document.getElementById('image').click()"
                                        class="btn btn-sm btn-outline-primary">
                                        <i class="bi bi-arrow-repeat me-1"></i>Thay ảnh
                                    </button>
                                    <button type="button" onclick="deleteCurrentImage()"
                                        class="btn btn-sm btn-outline-danger">
                                        <i class="bi bi-trash me-1"></i>Xóa ảnh
                                    </button>
                                </div>
                            </div>
                        </div>
                        @endif

                        {{-- Preview ảnh mới --}}
                        <div id="previewWrap" style="display:none;" class="mb-3">
                            <div class="position-relative">
                                <img id="previewImage" src="" alt="Preview"
                                    class="w-100 rounded-3" style="object-fit:cover;max-height:180px;">
                                <span class="position-absolute top-0 end-0 m-2 badge bg-warning text-dark">
                                    <i class="bi bi-arrow-repeat me-1"></i>Ảnh mới
                                </span>
                            </div>
                            <div id="fileInfo" class="mt-2 text-muted small d-flex align-items-center gap-1">
                                <i class="bi bi-file-earmark-image"></i>
                                <span id="fileName"></span>
                            </div>
                        </div>

                        {{-- Upload area --}}
                        <div id="uploadArea"
                            onclick="document.getElementById('image').click()"
                            ondragover="event.preventDefault();this.classList.add('drag-over')"
                            ondragleave="this.classList.remove('drag-over')"
                            ondrop="handleDrop(event)"
                            class="upload-area text-center rounded-3 py-4 px-3 {{ $item->image ? 'd-none' : '' }}">
                            <i class="bi bi-cloud-arrow-up text-muted" style="font-size:2.2rem"></i>
                            <p class="text-muted mb-1 mt-2 fw-semibold">Kéo thả ảnh vào đây</p>
                            <p class="text-muted small mb-0">hoặc <span class="text-primary fw-semibold">nhấn để chọn</span></p>
                        </div>

                        <input type="file" name="image" id="image" class="d-none" accept="image/*">
                        @error('image')
                            <div class="text-danger small mt-2 d-flex align-items-center gap-1">
                                <i class="bi bi-exclamation-circle-fill"></i> {{ $message }}
                            </div>
                        @enderror

                        <button type="button" id="removeBtn" onclick="removeImage()"
                            class="btn btn-outline-danger btn-sm w-100 mt-3" style="display:none">
                            <i class="bi bi-x-lg me-1"></i>Hủy ảnh mới, giữ ảnh cũ
                        </button>
                    </div>
                </div>

            </div>
        </div>

    </div>
</form>

<style>
.upload-area {
    border: 2px dashed #cbd5e1;
    background: #f8fafc;
    cursor: pointer;
    transition: all .2s;
}
.upload-area:hover, .upload-area.drag-over {
    border-color: #3b82f6;
    background: #eff6ff;
}
</style>

@push('scripts')
<script>
    // Đếm ký tự SEO
    function countChars(id, countId, max, warn) {
        const el = document.getElementById(id);
        const ct = document.getElementById(countId);
        if (!el || !ct) return;
        const update = () => {
            const n = el.value.length;
            ct.textContent = n + ' / ' + max;
            ct.className = n > warn ? 'text-warning small fw-semibold' : 'text-muted small';
        };
        el.addEventListener('input', update);
        update();
    }
    countChars('metaTitleInput', 'metaTitleCount', 255, 60);
    countChars('metaDescInput',  'metaDescCount',  1000, 160);

    // Upload ảnh
    const imageInput   = document.getElementById('image');
    const previewImage = document.getElementById('previewImage');
    const previewWrap  = document.getElementById('previewWrap');
    const uploadArea   = document.getElementById('uploadArea');
    const currentWrap  = document.getElementById('currentWrap');
    const removeBtn    = document.getElementById('removeBtn');
    const fileName     = document.getElementById('fileName');

    function showPreview(file) {
        if (!file || !file.type.startsWith('image/')) return;
        const reader = new FileReader();
        reader.onload = e => {
            previewImage.src = e.target.result;
            previewWrap.style.display = 'block';
            uploadArea.classList.add('d-none');
            if (currentWrap) currentWrap.style.display = 'none';
            removeBtn.style.display = 'block';
            fileName.textContent = file.name + ' (' + (file.size / 1024).toFixed(0) + ' KB)';
        };
        reader.readAsDataURL(file);
    }

    imageInput.addEventListener('change', e => showPreview(e.target.files[0]));

    function handleDrop(e) {
        e.preventDefault();
        e.currentTarget.classList.remove('drag-over');
        const file = e.dataTransfer.files[0];
        const dt = new DataTransfer();
        dt.items.add(file);
        imageInput.files = dt.files;
        showPreview(file);
    }

    function removeImage() {
        imageInput.value = '';
        previewImage.src = '';
        previewWrap.style.display = 'none';
        removeBtn.style.display   = 'none';
        fileName.textContent = '';
        if (currentWrap) currentWrap.style.display = 'block';
        else uploadArea.classList.remove('d-none');
    }

    function deleteCurrentImage() {
        if (!confirm('Xóa ảnh hiện tại? Ảnh sẽ bị xóa khi bạn lưu.')) return;
        document.getElementById('removeImageFlag').value = '1';
        if (currentWrap) currentWrap.style.display = 'none';
        uploadArea.classList.remove('d-none');
    }
</script>
@endpush

@endsection
