<?php

namespace App\Http\Controllers\Clients;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Models\ServicePackage;
use App\Models\IntroPost;
use App\Models\SocialLink;

class HomeController extends Controller
{
    public function index()
    {
        $banner          = Banner::getInstance();
        $servicePackages = ServicePackage::active()->orderBy('sort_order')->orderBy('created_at', 'desc')->get();
        $introPosts      = IntroPost::active()->orderBy('sort_order')->orderBy('created_at', 'desc')->get();
        $socialLinks     = SocialLink::active()->orderBy('sort_order')->get();

        return view('clients.index', compact('banner', 'servicePackages', 'introPosts', 'socialLinks'));
    }
}
