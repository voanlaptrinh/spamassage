<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ServicePackage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ServicePackageController extends Controller
{
    public function index(Request $request)
    {
        $query = ServicePackage::latest();

        if ($request->filled('name')) {
            $query->where('name', 'like', '%' . $request->name . '%');
        }

        $items = $query->paginate(15);

        return view('admin.goi_dich_vu.index', compact('items'));
    }

    public function create()
    {
        return view('admin.goi_dich_vu.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'             => 'required|string|max:255',
            'price'            => 'required|numeric|min:0',
            'image'            => 'nullable|image|max:5120',
            'meta_title'       => 'nullable|string|max:255',
            'meta_description' => 'nullable|string|max:1000',
        ]);

        $data = $request->only(['name', 'price', 'meta_title', 'meta_description']);
        $data['is_active'] = $request->boolean('is_active', true);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('goi_dich_vu', 'public');
        }

        ServicePackage::create($data);

        return redirect()->route('admin.goi_dich_vu.index')->with('success', 'Thêm gói dịch vụ thành công!');
    }

    public function edit(ServicePackage $goiDichVu)
    {
        return view('admin.goi_dich_vu.edit', ['item' => $goiDichVu]);
    }

    public function update(Request $request, ServicePackage $goiDichVu)
    {
        $request->validate([
            'name'             => 'required|string|max:255',
            'price'            => 'required|numeric|min:0',
            'image'            => 'nullable|image|max:5120',
            'meta_title'       => 'nullable|string|max:255',
            'meta_description' => 'nullable|string|max:1000',
        ]);

        $data = $request->only(['name', 'price', 'meta_title', 'meta_description']);
        $data['is_active'] = $request->boolean('is_active', true);

        if ($request->hasFile('image')) {
            if ($goiDichVu->image) {
                Storage::disk('public')->delete($goiDichVu->image);
            }
            $data['image'] = $request->file('image')->store('goi_dich_vu', 'public');
        }

        $goiDichVu->update($data);

        return redirect()->route('admin.goi_dich_vu.index')->with('success', 'Cập nhật gói dịch vụ thành công!');
    }

    public function destroy(ServicePackage $goiDichVu)
    {
        if ($goiDichVu->image) {
            Storage::disk('public')->delete($goiDichVu->image);
        }

        $goiDichVu->delete();

        return redirect()->route('admin.goi_dich_vu.index')->with('success', 'Xóa gói dịch vụ thành công!');
    }
}
