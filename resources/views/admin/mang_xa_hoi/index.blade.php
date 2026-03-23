@extends('admin.index')
@section('contentadmin')

<div class="pagetitle d-flex align-items-start justify-content-between flex-wrap gap-2">
    <div>
        <h1 class="mb-0">Mạng xã hội</h1>
        <nav><ol class="breadcrumb mb-0">
            <li class="breadcrumb-item text-muted">Admin</li>
            <li class="breadcrumb-item active">Mạng xã hội</li>
        </ol></nav>
    </div>
    <a href="{{ route('admin.mang_xa_hoi.create') }}" class="btn btn-success d-flex align-items-center gap-1">
        <i class="bi bi-plus-lg"></i> Thêm liên kết
    </a>
</div>

@if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <i class="bi bi-check-circle-fill me-2"></i>{{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
@endif

<div class="card border-0 shadow-sm">
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead>
                    <tr class="table-light text-uppercase" style="font-size:.75rem;letter-spacing:.05em">
                        <th class="ps-4" style="width:60px">Icon</th>
                        <th>Tên</th>
                        <th>URL</th>
                        <th class="text-center" style="width:90px">Thứ tự</th>
                        <th class="text-center" style="width:110px">Trạng thái</th>
                        <th class="text-center pe-4" style="width:110px">Thao tác</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($items as $item)
                    <tr>
                        <td class="ps-4">
                            <div class="rounded-circle d-flex align-items-center justify-content-center overflow-hidden"
                                style="width:40px;height:40px;background:{{ $item->color }}">
                                @if($item->icon)
                                    <img src="{{ asset($item->icon) }}" alt="{{ $item->label }}"
                                        style="width:22px;height:22px;object-fit:contain">
                                @endif
                            </div>
                        </td>
                        <td>
                            <span class="fw-semibold text-dark">{{ $item->label }}</span>
                        </td>
                        <td>
                            <a href="{{ $item->url }}" target="_blank" rel="noopener noreferrer"
                                class="text-muted small text-truncate d-block" style="max-width:280px">
                                {{ $item->url }}
                            </a>
                        </td>
                        <td class="text-center">
                            <span class="badge bg-light text-dark border fw-semibold">{{ $item->sort_order }}</span>
                        </td>
                        <td class="text-center">
                            @if($item->is_active)
                                <span class="badge rounded-pill px-3 py-2"
                                    style="background:#d1fae5;color:#065f46;font-size:.75rem">
                                    <i class="bi bi-circle-fill me-1" style="font-size:.45rem;vertical-align:middle"></i>Hiển thị
                                </span>
                            @else
                                <span class="badge rounded-pill px-3 py-2"
                                    style="background:#f3f4f6;color:#6b7280;font-size:.75rem">
                                    <i class="bi bi-circle-fill me-1" style="font-size:.45rem;vertical-align:middle"></i>Ẩn
                                </span>
                            @endif
                        </td>
                        <td class="text-center pe-4">
                            <a href="{{ route('admin.mang_xa_hoi.edit', $item) }}"
                                class="btn btn-sm btn-light border me-1" title="Sửa">
                                <i class="bi bi-pencil text-warning"></i>
                            </a>
                            <form action="{{ route('admin.mang_xa_hoi.destroy', $item) }}" method="POST"
                                class="d-inline" onsubmit="return confirm('Xóa liên kết «{{ $item->label }}»?')">
                                @csrf @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-light border" title="Xóa">
                                    <i class="bi bi-trash text-danger"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="text-center py-5">
                            <i class="bi bi-share d-block mb-2 text-muted" style="font-size:2rem"></i>
                            <span class="text-muted">Chưa có liên kết nào.</span>
                            <div class="mt-3">
                                <a href="{{ route('admin.mang_xa_hoi.create') }}" class="btn btn-success btn-sm">
                                    <i class="bi bi-plus-lg me-1"></i>Thêm ngay
                                </a>
                            </div>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection
