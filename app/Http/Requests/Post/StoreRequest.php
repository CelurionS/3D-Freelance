<?php

namespace App\Http\Requests\Post;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'required|string|min:3|max:250',
            'content' => 'required|string|min:3|max:6000',
            'featured_image' => 'required|image|max:1024|mimes:jpg,jpeg,png',
        ];
    }
    public function store(StoreRequest $request): RedirectResponse
{
    $validated = $request->validated();

    if ($request->hasFile('featured_image')) {
        $filePath = Storage::disk('public')->put('images/posts/featured-images', $request->file('featured_image'));
        $validated['featured_image'] = $filePath;
    }

    $create = Post::create($validated);

    if ($create) {
        session()->flash('notif.success', 'Post created successfully!');
        return redirect()->route('3dartist');
    }

    return abort(500);
}
}
