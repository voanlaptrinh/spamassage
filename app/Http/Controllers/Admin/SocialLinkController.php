<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SocialLink;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SocialLinkController extends Controller
{
    public function index()
    {
        $items = SocialLink::orderBy('sort_order')->get();
        return view('admin.mang_xa_hoi.index', compact('items'));
    }

    public function create()
    {
        return view('admin.mang_xa_hoi.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'label' => 'required|string|max:50',
            'icon'  => 'required|image|max:2048',
            'url'   => 'required|string|max:500',
            'color' => 'required|string|max:30',
        ]);

        SocialLink::create([
            'label'      => $request->label,
            'icon'       => $request->file('icon')->store('social_icons', 'public'),
            'url'        => $request->url,
            'color'      => $request->color,
            'is_active'  => $request->boolean('is_active'),
            'sort_order' => (SocialLink::max('sort_order') ?? 0) + 1,
        ]);

        return redirect()->route('admin.mang_xa_hoi.index')->with('success', 'Thêm liên kết thành công!');
    }

    public function edit(SocialLink $mangXaHoi)
    {
        return view('admin.mang_xa_hoi.edit', ['item' => $mangXaHoi]);
    }

    public function update(Request $request, SocialLink $mangXaHoi)
    {
        $request->validate([
            'label' => 'required|string|max:50',
            'icon'  => 'nullable|image|max:2048',
            'url'   => 'required|string|max:500',
            'color' => 'required|string|max:30',
        ]);

        $newOrder = (int) $request->input('sort_order', $mangXaHoi->sort_order);
        if ($newOrder !== $mangXaHoi->sort_order) {
            $conflict = SocialLink::where('sort_order', $newOrder)->where('id', '!=', $mangXaHoi->id)->first();
            if ($conflict) {
                $conflict->update(['sort_order' => $mangXaHoi->sort_order]);
            }
        }

        $data = [
            'label'      => $request->label,
            'url'        => $request->url,
            'color'      => $request->color,
            'is_active'  => $request->boolean('is_active'),
            'sort_order' => $newOrder,
        ];

        if ($request->hasFile('icon')) {
            Storage::disk('public')->delete($mangXaHoi->icon);
            $data['icon'] = $request->file('icon')->store('social_icons', 'public');
        }

        $mangXaHoi->update($data);

        return redirect()->route('admin.mang_xa_hoi.index')->with('success', 'Cập nhật thành công!');
    }

    public function destroy(SocialLink $mangXaHoi)
    {
        if ($mangXaHoi->icon) {
            Storage::disk('public')->delete($mangXaHoi->icon);
        }
        $mangXaHoi->delete();
        return redirect()->route('admin.mang_xa_hoi.index')->with('success', 'Đã xóa liên kết!');
    }
}
