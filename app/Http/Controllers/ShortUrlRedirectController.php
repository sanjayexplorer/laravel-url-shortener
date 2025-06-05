<?php

namespace App\Http\Controllers;

use App\Models\ShortUrl;
use Illuminate\Http\RedirectResponse;

class ShortUrlRedirectController extends Controller
{
    public function redirect($code): RedirectResponse
    {
        $shortUrl = ShortUrl::where('short_code', $code)->firstOrFail();

        return redirect()->to($shortUrl->original_url);
    }
}
