<?php

namespace App\Http\Controllers\Clients;

use App\Http\Controllers\Controller;
use App\Models\ServicePackage;
use App\Models\IntroPost;

class HomeController extends Controller
{
    public function index()
    {
        $servicePackages = ServicePackage::active()->latest()->get();
        $introPosts      = IntroPost::active()->latest()->get();

        return view('clients.index', compact('servicePackages', 'introPosts'));
    }
}
