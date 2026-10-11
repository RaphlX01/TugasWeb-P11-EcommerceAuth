<?php
namespace App\Policies;

use App\Models\Post;
use App\Models\User;

class PostPolicy
{
    // Admin bisa semua
    public function before(User $user, string $ability): ?bool
    {
        if ($user->role === 'admin') {
            return true;
        }
        return null;
    }

    public function viewAny(User $user): bool {
        return true;
    }

    public function view(User $user, Post $post): bool {
        return true;
    }

    public function create(User $user): bool {
        return in_array($user->role, ['admin', 'editor', 'user']);
    }

    public function update(User $user, Post $post): bool {
        return $user->id === $post->user_id || $user->role === 'editor';
    }

    public function delete(User $user, Post $post): bool {
        return $user->id === $post->user_id;
    }

    public function restore(User $user, Post $post): bool {
        return $user->role === 'admin';
    }

    public function forceDelete(User $user, Post $post): bool {
        return $user->role === 'admin';
    }
}