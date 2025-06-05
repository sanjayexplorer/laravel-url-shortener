<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ShortUrl;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class ShortUrlController extends Controller
{

    public function index()
    {
        $userId = Auth::id();

        $urls = ShortUrl::where('user_id',  $userId)->get();
        return view('member.short_urls.index', compact('urls'));
    }


    public function create()
    {
        return view('member.short_urls.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'original_url' => 'required|url',
        ]);

        $user = Auth::user();

        do {
            $shortCode = Str::random(6);
        } while (ShortUrl::where('short_code', $shortCode)->exists());

        $shortUrl = ShortUrl::create([
            'original_url' => $request->original_url,
            'short_code' => $shortCode,
            'user_id' => $user->id,
            'company_id' => $user->company_id,
        ]);

        return redirect()->route('member.dashboard')->with('success', 'Short URL created: ' . url($shortCode));
    }
}
