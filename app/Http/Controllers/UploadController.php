<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UploadController extends Controller
{
    public function uploadImage(Request $request)
    {
        $request->validate([
            'file' => 'required|image|mimes:jpeg,png,jpg,gif|max:5120',
        ]);

        $path = $request->file('file')->store('tyniimage', 'public');

        $location = asset('storage/' . $path);

        return response()->json(['location' => $location]);
    }

    public function deleteImage(Request $request)
    {
        $imageUrl = $request->input('image');
        if (!$imageUrl) {
            return response()->json(['message' => 'Không có đường dẫn ảnh'], 400);
        }

        // Chuyển URL → đường dẫn tương đối trong storage/public
        $relativePath = str_replace(asset('storage') . '/', '', $imageUrl);

        if (Storage::disk('public')->exists($relativePath)) {
            Storage::disk('public')->delete($relativePath);
            return response()->json(['message' => 'Ảnh đã được xóa']);
        }

        return response()->json(['message' => 'Ảnh không tồn tại hoặc không hợp lệ'], 404);
    }
}
