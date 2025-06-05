<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use App\Models\ShortUrl;

class ShortUrlController extends Controller
{
    public function index()
    {
        $shortUrls = ShortUrl::with('user.company')->get();
        return view('superadmin.short_urls.index', compact('shortUrls'));
    }
}
