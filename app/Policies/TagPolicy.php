<?php

namespace App\Policies;

use App\Models\Tag;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class TagPolicy
{

    public function viewAny(User $user): bool
    {

    }


    public function view(User $user, Tag $tag): bool
    {
        return $user->type =="admin" && $tag->id > 5 ;
    }


    public function create(User $user): bool
    {
        return $user->type =="admin";
    }


    public function update(User $user, Tag $tag): bool
    {

    }


    public function delete(User $user, Tag $tag): bool
    {

    }


    public function restore(User $user, Tag $tag): bool
    {

    }


    public function forceDelete(User $user, Tag $tag): bool
    {

    }
}
