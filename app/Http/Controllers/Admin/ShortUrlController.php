<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ShortUrl;
use Illuminate\Support\Str;
use Auth;

class ShortUrlController extends Controller
{
    public function index()
    {
        $urls = ShortUrl::where('company_id', Auth::user()->company_id)->get();
        return view('admin.short_urls.index', compact('urls'));
    }

    public function create()
    {
        return view('admin.short_urls.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'original_url' => 'required|url',
        ]);

        $short = ShortUrl::create([
            'user_id' => Auth::id(),
            'company_id' => Auth::user()->company_id,
            'original_url' => $request->original_url,
            'short_code' => Str::random(6),
        ]);

        return redirect()->route('admin.short-urls.index')->with('success', 'Short URL created.');
    }
}
