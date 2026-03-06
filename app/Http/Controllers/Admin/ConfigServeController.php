<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ConfigServer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;
use Exception;

class ConfigServeController extends Controller
{
    public function edit()
    {
        $config = ConfigServer::firstOrCreate(['id' => 1]);
        return view('admin.web_config.index', compact('config'));
    }

    /**
     * Update config server
     *
     * @param Request $request
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, $id)
    {
        try {
            // Tìm config server
            $configServer = ConfigServer::find($id);

            if (!$configServer) {
                return response()->json([
                    'success' => false,
                    'message' => 'Không tìm thấy cấu hình server',
                    'error_code' => 'CONFIG_NOT_FOUND'
                ], 404);
            }

            // Validation rules
            $validator = Validator::make($request->all(), [
                'email' => 'nullable|email|max:255',
                'hotline' => 'nullable|string|max:20',
                'phone' => 'nullable|string|max:20',
                'zalo_number' => 'nullable|string|max:20',
                'address' => 'nullable|string|max:500',
                'google_map_embed' => 'nullable|string',

                // Mạng xã hội
                'facebook_url' => 'nullable|url|max:255',
                'zalo_url' => 'nullable|url|max:255',
                'youtube_url' => 'nullable|url|max:255',
                'tiktok_url' => 'nullable|url|max:255',
                'instagram_url' => 'nullable|url|max:255',
                'linkedin_url' => 'nullable|url|max:255',
                'twitter_url' => 'nullable|url|max:255',

                // SEO
                'meta_title' => 'nullable|string|max:255',
                'meta_keywords' => 'nullable|string|max:500',
                'meta_description' => 'nullable|string|max:1000',
            ], [
                // Custom error messages
                'email.email' => 'Email không đúng định dạng',
                'email.max' => 'Email không được vượt quá 255 ký tự',
                'hotline.max' => 'Hotline không được vượt quá 20 ký tự',
                'phone.max' => 'Số điện thoại không được vượt quá 20 ký tự',
                'zalo_number.max' => 'Số Zalo không được vượt quá 20 ký tự',
                'address.max' => 'Địa chỉ không được vượt quá 500 ký tự',

                'facebook_url.url' => 'Facebook URL không đúng định dạng',
                'facebook_url.max' => 'Facebook URL không được vượt quá 255 ký tự',
                'zalo_url.url' => 'Zalo URL không đúng định dạng',
                'zalo_url.max' => 'Zalo URL không được vượt quá 255 ký tự',
                'youtube_url.url' => 'YouTube URL không đúng định dạng',
                'youtube_url.max' => 'YouTube URL không được vượt quá 255 ký tự',
                'tiktok_url.url' => 'TikTok URL không đúng định dạng',
                'tiktok_url.max' => 'TikTok URL không được vượt quá 255 ký tự',
                'instagram_url.url' => 'Instagram URL không đúng định dạng',
                'instagram_url.max' => 'Instagram URL không được vượt quá 255 ký tự',
                'linkedin_url.url' => 'LinkedIn URL không đúng định dạng',
                'linkedin_url.max' => 'LinkedIn URL không được vượt quá 255 ký tự',
                'twitter_url.url' => 'Twitter URL không đúng định dạng',
                'twitter_url.max' => 'Twitter URL không được vượt quá 255 ký tự',

                'meta_title.max' => 'Meta title không được vượt quá 255 ký tự',
                'meta_keywords.max' => 'Meta keywords không được vượt quá 500 ký tự',
                'meta_description.max' => 'Meta description không được vượt quá 1000 ký tự',
            ]);

            // Kiểm tra validation
            if ($validator->fails()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Dữ liệu không hợp lệ',
                    'errors' => $validator->errors(),
                    'error_code' => 'VALIDATION_ERROR'
                ], 422);
            }

            // Lấy dữ liệu đã validate
            $validatedData = $validator->validated();

            // Update config server
            $configServer->update($validatedData);

            return redirect()->route('web-config.edit')
                ->with('success', 'Cập nhật cấu hình server thành công');

        } catch (ValidationException $e) {
            return redirect()->back()
                ->withErrors($e->errors())
                ->withInput();

        } catch (Exception $e) {
            return redirect()->back()
                ->with('error', 'Có lỗi xảy ra khi cập nhật cấu hình server: ' . $e->getMessage())
                ->withInput();
        }
    }
}
