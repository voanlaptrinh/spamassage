@extends('admin.index')
@section('contentadmin')
    <div class="pagetitle">
        <h1>Cấu hình website</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">Admin</li>
                <li class="breadcrumb-item active">Cấu hình</li>
            </ol>
        </nav>
    </div>

<div class="card p-3">

  

    <form action="{{ route('admin.web-config.update', $config->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="card-body">
            <div class="row g-3">
                <!-- Liên hệ -->
                <div class="col-12">
                    <h5 class="border-bottom pb-2 mb-3">Thông tin liên hệ</h5>
                </div>

                <div class="col-md-6">
                    <label>Email</label>
                    <input name="email" type="email" class="form-control @error('email') is-invalid @enderror"
                        value="{{ old('email', $config->email) }}" placeholder="example@domain.com">
                    @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-6">
                    <label>Hotline</label>
                    <input name="hotline" class="form-control @error('hotline') is-invalid @enderror"
                        value="{{ old('hotline', $config->hotline) }}" placeholder="0123456789">
                    @error('hotline')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-6">
                    <label>Số điện thoại</label>
                    <input name="phone" class="form-control @error('phone') is-invalid @enderror"
                        value="{{ old('phone', $config->phone) }}" placeholder="0987654321">
                    @error('phone')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-6">
                    <label>Zalo</label>
                    <input name="zalo_number" class="form-control @error('zalo_number') is-invalid @enderror"
                        value="{{ old('zalo_number', $config->zalo_number) }}" placeholder="0123456789">
                    @error('zalo_number')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-12">
                    <label>Địa chỉ</label>
                    <input name="address" class="form-control @error('address') is-invalid @enderror"
                        value="{{ old('address', $config->address) }}" placeholder="Nhập địa chỉ">
                    @error('address')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-12">
                    <label>Google Map Embed</label>
                    <textarea name="google_map_embed" class="form-control @error('google_map_embed') is-invalid @enderror" rows="3" placeholder="<iframe src='...'></iframe>">{{ old('google_map_embed', $config->google_map_embed) }}</textarea>
                    @error('google_map_embed')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Mạng xã hội -->
                <div class="col-12 mt-4">
                    <h5 class="border-bottom pb-2 mb-3">Mạng xã hội</h5>
                </div>

                @foreach (['facebook', 'zalo', 'youtube', 'tiktok', 'instagram', 'linkedin', 'twitter'] as $platform)
                    <div class="col-md-6">
                        <label>{{ ucfirst($platform) }} URL</label>
                        <input name="{{ $platform }}_url" type="url" class="form-control @error($platform . '_url') is-invalid @enderror"
                            value="{{ old($platform . '_url', $config->{$platform . '_url'}) }}" placeholder="https://{{ $platform }}.com/...">
                        @error($platform . '_url')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                @endforeach

                <!-- SEO -->
                <div class="col-12 mt-4">
                    <h5 class="border-bottom pb-2 mb-3">SEO</h5>
                </div>

                <div class="col-md-6">
                    <label>Meta Title</label>
                    <input name="meta_title" class="form-control @error('meta_title') is-invalid @enderror"
                        value="{{ old('meta_title', $config->meta_title) }}" placeholder="Tiêu đề trang web" maxlength="255">
                    <small class="text-muted">Tối đa 255 ký tự</small>
                    @error('meta_title')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-6">
                    <label>Meta Keywords</label>
                    <input name="meta_keywords" class="form-control @error('meta_keywords') is-invalid @enderror"
                        value="{{ old('meta_keywords', $config->meta_keywords) }}" placeholder="từ khóa 1, từ khóa 2, ..." maxlength="500">
                    <small class="text-muted">Tối đa 500 ký tự</small>
                    @error('meta_keywords')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-12">
                    <label>Meta Description</label>
                    <textarea name="meta_description" class="form-control @error('meta_description') is-invalid @enderror" rows="3" placeholder="Mô tả ngắn về website" maxlength="1000">{{ old('meta_description', $config->meta_description) }}</textarea>
                    <small class="text-muted">Tối đa 1000 ký tự</small>
                    @error('meta_description')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
        </div>

        <div class="card-footer text-end">
            <button type="submit" class="btn btn-primary">
                <i class="bi bi-save"></i> Cập nhật
            </button>
        </div>
    </form>
</div>
@endsection
