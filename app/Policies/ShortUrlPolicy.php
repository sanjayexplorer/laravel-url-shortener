<?php
namespace App\Policies;
use Illuminate\Auth\Access\Response;
use App\Models\ShortUrl;
use App\Models\User;

class ShortUrlPolicy
{
    public function viewAny(User $user)
    {
        return $user->hasRole(['Admin', 'Member', 'SuperAdmin']);
    }

    public function view(User $user, ShortUrl $shortUrl)
    {
        if ($user->hasRole('SuperAdmin')) {
            return true;
        }
        if ($user->hasRole('Admin') && $shortUrl->user->company_id === $user->company_id) {
            return true;
        }
        return $user->id === $shortUrl->user_id;
    }

    public function create(User $user)
    {
        return $user->hasRole(['Admin', 'Member']);
    }
}
