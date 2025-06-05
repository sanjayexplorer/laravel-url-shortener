<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ShortUrl;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $userId = Auth::id();

        $shortUrls = ShortUrl::where('user_id', $userId)->get();

        return view('member.dashboard', compact('shortUrls'));
    }
}
