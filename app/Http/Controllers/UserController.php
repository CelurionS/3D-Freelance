<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function showDashboard(User $user)
    {
        $currentUser = auth()->user();
        $isOwner = $currentUser && $currentUser->id === $user->id;
        $readonly = !$isOwner;
        
        // Fetch artworks for the user
        $artworks = $user->artworks; // Assuming you have a relationship set up in the User model

        return view('dashboard', [
            'user' => $user,
            'readonly' => $readonly,
            'artworks' => $artworks
        ]);
    }
}

