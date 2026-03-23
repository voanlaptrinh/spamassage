<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ServicePackage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ServicePackageController extends Controller
{
    public function index(Request $request)
    {
        $query = ServicePackage::orderBy('sort_order');

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
            'description'      => 'nullable|string',
            'price'            => 'required|numeric|min:0',
            'image'            => 'nullable|image|max:5120',
            'meta_title'       => 'nullable|string|max:255',
            'meta_description' => 'nullable|string|max:1000',
        ]);

        $data = $request->only(['name', 'description', 'price', 'meta_title', 'meta_description']);
        $data['is_active']  = $request->boolean('is_active');
        $data['sort_order'] = (ServicePackage::max('sort_order') ?? 0) + 1;

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = uniqid() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads/goi_dich_vu'), $filename);
            $data['image'] = 'uploads/goi_dich_vu/' . $filename;
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
            'description'      => 'nullable|string',
            'price'            => 'required|numeric|min:0',
            'image'            => 'nullable|image|max:5120',
            'sort_order'       => 'nullable|integer|min:0',
            'meta_title'       => 'nullable|string|max:255',
            'meta_description' => 'nullable|string|max:1000',
        ]);

        $data = $request->only(['name', 'description', 'price', 'meta_title', 'meta_description']);
        $data['is_active'] = $request->boolean('is_active');

        $newOrder = (int) $request->input('sort_order', $goiDichVu->sort_order);
        if ($newOrder !== $goiDichVu->sort_order) {
            $conflict = ServicePackage::where('sort_order', $newOrder)->where('id', '!=', $goiDichVu->id)->first();
            if ($conflict) {
                $conflict->update(['sort_order' => $goiDichVu->sort_order]);
            }
        }
        $data['sort_order'] = $newOrder;

        if ($request->boolean('remove_image') && $goiDichVu->image) {
            File::delete(public_path($goiDichVu->image));
            $data['image'] = null;
        }

        if ($request->hasFile('image')) {
            if ($goiDichVu->image) {
                File::delete(public_path($goiDichVu->image));
            }
            $file = $request->file('image');
            $filename = uniqid() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads/goi_dich_vu'), $filename);
            $data['image'] = 'uploads/goi_dich_vu/' . $filename;
        }

        $goiDichVu->update($data);

        return redirect()->route('admin.goi_dich_vu.index')->with('success', 'Cập nhật gói dịch vụ thành công!');
    }

    public function destroy(ServicePackage $goiDichVu)
    {
        if ($goiDichVu->image) {
            File::delete(public_path($goiDichVu->image));
        }

        $goiDichVu->delete();

        return redirect()->route('admin.goi_dich_vu.index')->with('success', 'Xóa gói dịch vụ thành công!');
    }
}
