@extends('admin.index')
@section('contentadmin')

<div class="pagetitle">
    <h1>Sửa liên kết mạng xã hội</h1>
    <nav><ol class="breadcrumb mb-0">
        <li class="breadcrumb-item text-muted">Admin</li>
        <li class="breadcrumb-item"><a href="{{ route('admin.mang_xa_hoi.index') }}">Mạng xã hội</a></li>
        <li class="breadcrumb-item active">Sửa</li>
    </ol></nav>
</div>

<form action="{{ route('admin.mang_xa_hoi.update', $item) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="row g-3">

        <div class="col-lg-8">
            <div class="card border-0 shadow-sm">
                <div class="card-header bg-white border-bottom py-3 d-flex align-items-center gap-2">
                    <span class="rounded-2 p-1 px-2" style="background:#eff6ff">
                        <i class="bi bi-share-fill text-primary"></i>
                    </span>
                    <span class="fw-semibold">Thông tin liên kết</span>
                </div>
                <div class="card-body py-4 d-flex flex-column gap-3">

                    <div>
                        <label class="form-label fw-semibold mb-1">Tên hiển thị <span class="text-danger">*</span></label>
                        <input type="text" name="label"
                            class="form-control @error('label') is-invalid @enderror"
                            value="{{ old('label', $item->label) }}" placeholder="VD: Facebook, Zalo...">
                        @error('label')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>

                    <div>
                        <label class="form-label fw-semibold mb-1">URL <span class="text-danger">*</span></label>
                        <input type="text" name="url"
                            class="form-control @error('url') is-invalid @enderror"
                            value="{{ old('url', $item->url) }}" placeholder="https://...">
                        @error('url')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>

                    <div>
                        <label class="form-label fw-semibold mb-1">Ảnh icon</label>

                        {{-- Ảnh hiện tại --}}
                        @if($item->icon)
                        <div id="currentWrap" class="mb-2">
                            <div class="d-flex align-items-center gap-3 p-3 rounded-3 border bg-light">
                                <img src="{{ asset($item->icon) }}" alt="{{ $item->label }}"
                                    style="width:48px;height:48px;object-fit:contain;border-radius:8px;background:#fff;padding:4px;border:1px solid #dee2e6">
                                <div>
                                    <small class="text-muted d-flex align-items-center gap-1">
                                        <i class="bi bi-check-circle-fill text-success"></i> Ảnh hiện tại
                                    </small>
                                    <button type="button" onclick="document.getElementById('iconFile').click()"
                                        class="btn btn-sm btn-outline-primary mt-1">
                                        <i class="bi bi-arrow-repeat me-1"></i>Thay ảnh
                                    </button>
                                </div>
                            </div>
                        </div>
                        @endif

                        {{-- Upload mới --}}
                        <div id="uploadArea" onclick="document.getElementById('iconFile').click()"
                            ondragover="event.preventDefault();this.classList.add('drag-over')"
                            ondragleave="this.classList.remove('drag-over')"
                            ondrop="handleDrop(event)"
                            class="upload-area text-center rounded-3 py-4 px-3 {{ $item->icon ? 'd-none' : '' }}">
                            <i class="bi bi-cloud-arrow-up text-muted" style="font-size:2rem"></i>
                            <p class="text-muted mb-1 mt-2 fw-semibold">Kéo thả ảnh vào đây</p>
                            <p class="text-muted small mb-0">hoặc <span class="text-primary fw-semibold">nhấn để chọn</span></p>
                            <small class="text-muted" style="font-size:.72rem">PNG, SVG, JPG — tối đa 2MB</small>
                        </div>

                        <div id="previewWrap" class="mt-2" style="display:none">
                            <div class="d-flex align-items-center gap-3 p-3 rounded-3 border bg-light">
                                <img id="previewImg" src="" alt=""
                                    style="width:48px;height:48px;object-fit:contain;border-radius:8px;background:#fff;padding:4px;border:1px solid #dee2e6">
                                <div>
                                    <div id="previewFileName" class="fw-semibold small text-dark"></div>
                                    <button type="button" onclick="clearIcon()" class="btn btn-sm btn-outline-danger mt-1">
                                        <i class="bi bi-x-lg me-1"></i>Hủy
                                    </button>
                                </div>
                            </div>
                        </div>

                        <input type="file" name="icon" id="iconFile" class="d-none" accept="image/*">
                        @error('icon')<div class="text-danger small mt-1"><i class="bi bi-exclamation-circle-fill"></i> {{ $message }}</div>@enderror
                    </div>

                    <div>
                        <label class="form-label fw-semibold mb-1">Màu nền nút <span class="text-danger">*</span></label>
                        <div class="d-flex align-items-center gap-2">
                            <input type="color" name="color" id="colorPicker"
                                class="form-control form-control-color"
                                value="{{ old('color', $item->color) }}" style="width:50px;height:38px;padding:2px">
                            <input type="text" id="colorHex" class="form-control" style="max-width:120px;font-family:monospace"
                                value="{{ old('color', $item->color) }}" placeholder="#1877F2" maxlength="30">
                        </div>
                        <div class="mt-2 d-flex flex-wrap gap-1">
                            @foreach(['#1877F2'=>'Facebook','#E1306C'=>'Instagram','#FF0000'=>'YouTube','#010101'=>'TikTok','#000000'=>'X','#0077B5'=>'LinkedIn','#25D366'=>'WhatsApp','#0088ff'=>'Zalo','#4CAF50'=>'Phone'] as $hex => $name)
                                <button type="button" class="color-preset" title="{{ $name }}" data-color="{{ $hex }}"
                                    style="width:26px;height:26px;background:{{ $hex }};border:2px solid #dee2e6;border-radius:4px;padding:0;cursor:pointer"></button>
                            @endforeach
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="card border-0 shadow-sm sticky-top" style="top:80px">
                <div class="card-header bg-white border-bottom py-3 d-flex align-items-center gap-2">
                    <span class="rounded-2 p-1 px-2" style="background:#fdf4ff">
                        <i class="bi bi-toggle-on" style="color:#9333ea"></i>
                    </span>
                    <span class="fw-semibold">Xuất bản</span>
                </div>
                <div class="card-body py-3">
                    <div class="p-3 rounded-3 d-flex align-items-center justify-content-between gap-3 mb-3"
                        style="background:#f8fafc;border:1px solid #e2e8f0">
                        <div>
                            <div class="fw-semibold text-dark">Hiển thị</div>
                            <small class="text-muted">Bật để hiện trên website</small>
                        </div>
                        <div class="form-check form-switch mb-0">
                            <input class="form-check-input" type="checkbox" name="is_active" value="1"
                                role="switch" style="width:3em;height:1.5em;cursor:pointer"
                                {{ old('is_active', $item->is_active) ? 'checked' : '' }}>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-semibold mb-1">
                            <i class="bi bi-sort-numeric-up me-1 text-muted"></i>Thứ tự hiển thị
                        </label>
                        <input type="number" name="sort_order" min="0" class="form-control"
                            value="{{ old('sort_order', $item->sort_order) }}">
                        <small class="text-muted">Số nhỏ hơn hiển thị trước</small>
                    </div>

                    <div class="text-center">
                        <div class="fw-semibold text-muted small mb-2">Xem trước nút</div>
                        <div id="btnPreview" class="rounded-circle d-inline-flex align-items-center justify-content-center"
                            style="width:54px;height:54px;background:{{ old('color', $item->color) }}">
                            @if($item->icon)
                                <img id="btnPreviewImg" src="{{ asset($item->icon) }}" alt=""
                                    style="width:28px;height:28px;object-fit:contain">
                                <i id="btnPreviewIcon" class="bi bi-image text-white fs-5" style="display:none"></i>
                            @else
                                <img id="btnPreviewImg" src="" alt="" style="width:28px;height:28px;object-fit:contain;display:none">
                                <i id="btnPreviewIcon" class="bi bi-image text-white fs-5"></i>
                            @endif
                        </div>
                        <div id="previewLabel" class="small text-muted mt-1">{{ old('label', $item->label) }}</div>
                    </div>
                </div>
                <div class="card-footer bg-white border-top py-3 d-flex gap-2 justify-content-end">
                    <a href="{{ route('admin.mang_xa_hoi.index') }}" class="btn btn-outline-secondary px-3">
                        <i class="bi bi-arrow-left me-1"></i>Hủy
                    </a>
                    <button type="submit" class="btn btn-primary px-4">
                        <i class="bi bi-save me-1"></i>Cập nhật
                    </button>
                </div>
            </div>
        </div>

    </div>
</form>

<style>
.upload-area { border:2px dashed #cbd5e1;background:#f8fafc;cursor:pointer;transition:all .2s; }
.upload-area:hover,.upload-area.drag-over { border-color:#3b82f6;background:#eff6ff; }
</style>

@push('scripts')
<script>
const iconFile       = document.getElementById('iconFile');
const previewWrap    = document.getElementById('previewWrap');
const previewImg     = document.getElementById('previewImg');
const previewFileName = document.getElementById('previewFileName');
const uploadArea     = document.getElementById('uploadArea');
const currentWrap    = document.getElementById('currentWrap');
const btnPreview     = document.getElementById('btnPreview');
const btnPreviewImg  = document.getElementById('btnPreviewImg');
const btnPreviewIcon = document.getElementById('btnPreviewIcon');
const colorPicker    = document.getElementById('colorPicker');
const colorHex       = document.getElementById('colorHex');
const labelInput     = document.querySelector('[name="label"]');
const previewLabel   = document.getElementById('previewLabel');

function showIconPreview(file) {
    if (!file || !file.type.startsWith('image/')) return;
    const reader = new FileReader();
    reader.onload = e => {
        previewImg.src = e.target.result;
        btnPreviewImg.src = e.target.result;
        previewWrap.style.display = 'block';
        uploadArea.classList.add('d-none');
        if (currentWrap) currentWrap.style.display = 'none';
        btnPreviewImg.style.display = 'block';
        btnPreviewIcon.style.display = 'none';
        previewFileName.textContent = file.name + ' (' + (file.size/1024).toFixed(0) + ' KB)';
    };
    reader.readAsDataURL(file);
}

function clearIcon() {
    iconFile.value = '';
    previewWrap.style.display = 'none';
    if (currentWrap) currentWrap.style.display = '';
    else uploadArea.classList.remove('d-none');
}

iconFile.addEventListener('change', e => showIconPreview(e.target.files[0]));

function handleDrop(e) {
    e.preventDefault();
    e.currentTarget.classList.remove('drag-over');
    const file = e.dataTransfer.files[0];
    const dt = new DataTransfer();
    dt.items.add(file);
    iconFile.files = dt.files;
    showIconPreview(file);
}

colorPicker.addEventListener('input', e => {
    colorHex.value = e.target.value;
    btnPreview.style.background = e.target.value;
});
colorHex.addEventListener('input', e => {
    colorPicker.value = e.target.value;
    btnPreview.style.background = e.target.value;
});
document.querySelectorAll('.color-preset').forEach(btn => {
    btn.addEventListener('click', () => {
        colorPicker.value = btn.dataset.color;
        colorHex.value = btn.dataset.color;
        btnPreview.style.background = btn.dataset.color;
    });
});

colorHex.removeAttribute('name');

labelInput.addEventListener('input', () => {
    previewLabel.textContent = labelInput.value || 'Tên';
});
</script>
@endpush

@endsection
