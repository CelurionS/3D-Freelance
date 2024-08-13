<?php

// app/Http/Controllers/ProfilePageController.php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Models\Artwork;
use App\Models\User;


class ProfilePageController extends Controller
{
    public function show(User $user)
    {
        $artworks = $user->artworks; // Fetch user's artworks

        return view('dashboard', [
            'user' => $user,
            'artworks' => $artworks,
        ]);
    }

    public function update(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'description' => 'nullable|string',
            'profile_picture' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('profile_picture')) {
            $imagePath = $request->file('profile_picture')->store('profile_pictures', 'public');
            $user->profile_picture_url = Storage::url($imagePath);
        }

        if ($request->has('description')) {
            $user->description = $request->input('description');
        }

        $user->save();

        return redirect()->back()->with('status', 'Profile updated successfully!');
    }

    public function uploadArtwork(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'title' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $imagePath = $request->file('image')->store('artworks', 'public');

        Artwork::create([
            'user_id' => $user->id,
            'title' => $request->input('title'),
            'image' => Storage::url($imagePath),
        ]);

        return redirect()->back()->with('status', 'Artwork uploaded successfully!');
    }
}
