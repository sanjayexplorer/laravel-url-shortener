<?php

namespace App\Providers;
use App\Models\ShortUrl;
use App\Policies\ShortUrlPolicy;
// use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{

    protected $policies = [
        ShortUrl::class => ShortUrlPolicy::class,
    ];

    public function boot(): void
    {

    }
}
