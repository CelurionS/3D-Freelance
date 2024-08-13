<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;
use App\Models\Post;
use App\Http\Requests\Post\StoreRequest;
use App\Http\Requests\Post\UpdateRequest;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): Response
    {
        return response()->view('posts.index', [
            'posts' => Post::where('user_id', auth()->id())->orderBy('updated_at', 'desc')->get()

        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): Response
    {
        return response()->view('posts.form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request): RedirectResponse
    {
        $validated = $request->validated();
        $validated['user_id'] = auth()->id(); // Set the user ID

        if ($request->hasFile('featured_image')) {
            $filePath = Storage::disk('public')->put('images/posts/featured-images', $request->file('featured_image'));
            $validated['featured_image'] = $filePath;
        }

        $create = Post::create($validated);

        if ($create) {
            session()->flash('notif.success', 'Post created successfully!');
            return redirect()->route('posts.index');
        }

        return abort(500);
    }

    /**
     * Display the specified resource.
     */

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id): Response
    {
        $post = Post::findOrFail($id);

        if ($post->user_id !== auth()->id()) {
            return abort(403);
        }

        return response()->view('posts.form', ['post' => $post]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, string $id): RedirectResponse
    {
        $post = Post::findOrFail($id);

        if ($post->user_id !== auth()->id()) {
            return abort(403);
        }

        $validated = $request->validated();

        if ($request->hasFile('featured_image')) {
            Storage::disk('public')->delete($post->featured_image);
            $filePath = Storage::disk('public')->put('images/posts/featured-images', $request->file('featured_image'), 'public');
            $validated['featured_image'] = $filePath;
        }

        $update = $post->update($validated);

        if ($update) {
            session()->flash('notif.success', 'Post updated successfully!');
            return redirect()->route('posts.index');
        }

        return abort(500);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): RedirectResponse
    {
        $post = Post::findOrFail($id);

        if ($post->user_id !== auth()->id()) {
            return abort(403);
        }

        Storage::disk('public')->delete($post->featured_image);

        $delete = $post->delete();

        if ($delete) {
            session()->flash('notif.success', 'Post deleted successfully!');
            return redirect()->route('posts.index');
        }

        return abort(500);
    }

    /**
     * Display all posts for the 3D Artist page.
     */
    public function allPosts(): Response
    {
        return response()->view('posts.3dartist', [
            'posts' => Post::orderBy('updated_at', 'desc')->get(),
        ]);
    }
}
