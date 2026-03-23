<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class UploadController extends Controller
{
    public function uploadImage(Request $request)
    {
        $request->validate([
            'file' => 'required|image|mimes:jpeg,png,jpg,gif|max:5120',
        ]);

        $file = $request->file('file');
        $filename = uniqid() . '.' . $file->getClientOriginalExtension();
        $file->move(public_path('uploads/tyniimage'), $filename);

        $location = asset('uploads/tyniimage/' . $filename);

        return response()->json(['location' => $location]);
    }

    public function deleteImage(Request $request)
    {
        $imageUrl = $request->input('image');
        if (!$imageUrl) {
            return response()->json(['message' => 'Không có đường dẫn ảnh'], 400);
        }

        $relativePath = ltrim(parse_url($imageUrl, PHP_URL_PATH), '/');

        if (File::exists(public_path($relativePath))) {
            File::delete(public_path($relativePath));
            return response()->json(['message' => 'Ảnh đã được xóa']);
        }

        return response()->json(['message' => 'Ảnh không tồn tại hoặc không hợp lệ'], 404);
    }
}
