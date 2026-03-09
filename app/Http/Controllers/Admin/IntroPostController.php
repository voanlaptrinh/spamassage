<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\IntroPost;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class IntroPostController extends Controller
{
    public function index(Request $request)
    {
        $query = IntroPost::orderBy('sort_order');

        if ($request->filled('title')) {
            $query->where('title', 'like', '%' . $request->title . '%');
        }

        $items = $query->paginate(15);

        return view('admin.bai_viet.index', compact('items'));
    }

    public function create()
    {
        return view('admin.bai_viet.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title'            => 'required|string|max:255',
            'content'          => 'required|string',
            'image'            => 'nullable|image|max:5120',
            'meta_title'       => 'nullable|string|max:255',
            'meta_description' => 'nullable|string|max:1000',
        ]);

        $data = $request->only(['title', 'content', 'meta_title', 'meta_description']);
        $data['is_active'] = $request->boolean('is_active');
        $data['sort_order'] = (IntroPost::max('sort_order') ?? 0) + 1;

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('bai_viet', 'public');
        }

        IntroPost::create($data);

        return redirect()->route('admin.bai_viet.index')->with('success', 'Thêm bài viết thành công!');
    }

    public function edit(IntroPost $baiViet)
    {
        return view('admin.bai_viet.edit', ['item' => $baiViet]);
    }

    public function update(Request $request, IntroPost $baiViet)
    {
        $request->validate([
            'title'            => 'required|string|max:255',
            'content'          => 'required|string',
            'image'            => 'nullable|image|max:5120',
            'sort_order'       => 'nullable|integer|min:0',
            'meta_title'       => 'nullable|string|max:255',
            'meta_description' => 'nullable|string|max:1000',
        ]);

        $data = $request->only(['title', 'content', 'meta_title', 'meta_description']);
        $data['is_active'] = $request->boolean('is_active');

        $newOrder = (int) $request->input('sort_order', $baiViet->sort_order);
        if ($newOrder !== $baiViet->sort_order) {
            $conflict = IntroPost::where('sort_order', $newOrder)->where('id', '!=', $baiViet->id)->first();
            if ($conflict) {
                $conflict->update(['sort_order' => $baiViet->sort_order]);
            }
        }
        $data['sort_order'] = $newOrder;

        if ($request->boolean('remove_image') && $baiViet->image) {
            Storage::disk('public')->delete($baiViet->image);
            $data['image'] = null;
        }

        if ($request->hasFile('image')) {
            if ($baiViet->image) {
                Storage::disk('public')->delete($baiViet->image);
            }
            $data['image'] = $request->file('image')->store('bai_viet', 'public');
        }

        $baiViet->update($data);

        return redirect()->route('admin.bai_viet.index')->with('success', 'Cập nhật bài viết thành công!');
    }

    public function destroy(IntroPost $baiViet)
    {
        if ($baiViet->image) {
            Storage::disk('public')->delete($baiViet->image);
        }

        $baiViet->delete();

        return redirect()->route('admin.bai_viet.index')->with('success', 'Xóa bài viết thành công!');
    }
}
