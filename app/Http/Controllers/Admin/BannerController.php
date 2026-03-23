<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class BannerController extends Controller
{
    public function edit()
    {
        $banner = Banner::getInstance();
        return view('admin.banner.edit', compact('banner'));
    }

    public function update(Request $request, Banner $banner)
    {
        $request->validate([
            'title'              => 'required|string|max:255',
            'badge_text'         => 'nullable|string|max:100',
            'description'        => 'nullable|string|max:500',
            'btn_primary_text'   => 'nullable|string|max:100',
            'btn_primary_url'    => 'nullable|string|max:255',
            'btn_secondary_text' => 'nullable|string|max:100',
            'btn_secondary_url'  => 'nullable|string|max:255',
            'image'              => 'nullable|image|max:5120',
        ]);

        $data = $request->only([
            'title', 'badge_text', 'description',
            'btn_primary_text', 'btn_primary_url',
            'btn_secondary_text', 'btn_secondary_url',
            'is_active',
        ]);

        $data['is_active'] = $request->boolean('is_active');

        if ($request->boolean('remove_image') && $banner->image) {
            File::delete(public_path($banner->image));
            $data['image'] = null;
        }

        if ($request->hasFile('image')) {
            if ($banner->image) {
                File::delete(public_path($banner->image));
            }
            $file = $request->file('image');
            $filename = uniqid() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads/banner'), $filename);
            $data['image'] = 'uploads/banner/' . $filename;
        }

        $banner->update($data);

        return back()->with('success', 'Cập nhật banner thành công!');
    }
}
