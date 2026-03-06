@extends('admin.index')
@section('contentadmin')

<div class="pagetitle d-flex align-items-start justify-content-between flex-wrap gap-2">
    <div>
        <h1 class="mb-0">Gói dịch vụ</h1>
        <nav><ol class="breadcrumb mb-0">
            <li class="breadcrumb-item text-muted">Admin</li>
            <li class="breadcrumb-item active">Gói dịch vụ</li>
        </ol></nav>
    </div>
    <a href="{{ route('admin.goi_dich_vu.create') }}" class="btn btn-success d-flex align-items-center gap-1">
        <i class="bi bi-plus-lg"></i> Thêm gói dịch vụ
    </a>
</div>

<div class="card border-0 shadow-sm">
    {{-- Toolbar --}}
    <div class="card-header bg-white border-bottom py-3">
        <form method="GET" action="{{ route('admin.goi_dich_vu.index') }}"
            class="d-flex flex-wrap align-items-center gap-2">
            <div class="input-group" style="max-width:300px">
                <span class="input-group-text bg-light border-end-0 text-muted">
                    <i class="bi bi-search"></i>
                </span>
                <input type="text" name="name" class="form-control border-start-0 ps-0"
                    placeholder="Tìm tên gói..." value="{{ request('name') }}">
            </div>
            <button type="submit" class="btn btn-primary">Tìm kiếm</button>
            @if(request('name'))
                <a href="{{ route('admin.goi_dich_vu.index') }}" class="btn btn-outline-secondary">
                    <i class="bi bi-x-lg me-1"></i>Xóa lọc
                </a>
            @endif
            <span class="ms-auto text-muted small">
                Tổng <strong class="text-dark">{{ $items->total() }}</strong> gói
            </span>
        </form>
    </div>

    {{-- Table --}}
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead>
                    <tr class="table-light text-uppercase" style="font-size:.75rem;letter-spacing:.05em">
                        <th class="ps-4" style="width:70px">Ảnh</th>
                        <th>Tên gói dịch vụ</th>
                        <th style="width:170px">Giá</th>
                        <th class="text-center" style="width:120px">Trạng thái</th>
                        <th class="text-center" style="width:120px">Ngày tạo</th>
                        <th class="text-center pe-4" style="width:110px">Thao tác</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($items as $item)
                    <tr>
                        <td class="ps-4">
                            @if($item->image)
                                <img src="{{ asset('storage/' . $item->image) }}" alt="{{ $item->name }}"
                                    class="rounded-2 border"
                                    style="width:52px;height:52px;object-fit:cover;">
                            @else
                                <div class="rounded-2 border bg-light d-flex align-items-center justify-content-center"
                                    style="width:52px;height:52px;color:#adb5bd;">
                                    <i class="bi bi-image fs-5"></i>
                                </div>
                            @endif
                        </td>
                        <td>
                            <span class="fw-semibold text-dark">{{ $item->name }}</span>
                        </td>
                        <td>
                            <span class="fw-bold text-primary">
                                {{ number_format($item->price, 0, ',', '.') }}&thinsp;đ
                            </span>
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
                        <td class="text-center text-muted small">
                            {{ $item->created_at->format('d/m/Y') }}
                        </td>
                        <td class="text-center pe-4">
                            <a href="{{ route('admin.goi_dich_vu.edit', $item) }}"
                                class="btn btn-sm btn-light border me-1" title="Sửa">
                                <i class="bi bi-pencil text-warning"></i>
                            </a>
                            <form action="{{ route('admin.goi_dich_vu.destroy', $item) }}" method="POST"
                                class="d-inline" onsubmit="return confirm('Xóa gói «{{ $item->name }}»?')">
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
                            <i class="bi bi-box-seam d-block mb-2 text-muted" style="font-size:2rem"></i>
                            <span class="text-muted">
                                @if(request('name'))
                                    Không tìm thấy gói nào với từ khóa <strong>«{{ request('name') }}»</strong>
                                @else
                                    Chưa có gói dịch vụ nào.
                                @endif
                            </span>
                            <div class="mt-3">
                                <a href="{{ route('admin.goi_dich_vu.create') }}" class="btn btn-success btn-sm">
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

    @if($items->hasPages())
    <div class="card-footer bg-white border-top d-flex justify-content-between align-items-center py-2 px-4">
        <small class="text-muted">
            Hiển thị {{ $items->firstItem() }}–{{ $items->lastItem() }} / {{ $items->total() }} gói
        </small>
        {{ $items->appends(request()->query())->links('pagination::bootstrap-4') }}
    </div>
    @endif
</div>

@endsection
