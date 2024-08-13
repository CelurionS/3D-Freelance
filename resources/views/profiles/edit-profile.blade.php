@extends('layouts.app')

@section('content')
<div class="container mx-auto p-4">
    <h1 class="text-2xl font-bold">Edit Profile</h1>
    <form action="{{ route('profiles.update', $profile->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ $profile->name }}" required>
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <textarea name="description" id="description" class="form-control" required>{{ $profile->description }}</textarea>
        </div>
        <div class="form-group">
            <label for="picture">Profile Picture</label>
            <input type="file" name="picture" id="picture" class="form-control">
            @if ($profile->picture)
                <img src="{{ asset('storage/' . $profile->picture) }}" alt="{{ $profile->name }}" class="img-thumbnail mt-2">
            @endif
        </div>
        <div class="form-group">
            <label for="artwork1">Artwork 1</label>
            <input type="file" name="artwork1" id="artwork1" class="form-control">
            @if ($profile->artwork1)
                <img src="{{ asset('storage/' . $profile->artwork1) }}" alt="Artwork 1" class="img-thumbnail mt-2">
            @endif
        </div>
        <div class="form-group">
            <label for="artwork2">Artwork 2</label>
            <input type="file" name="artwork2" id="artwork2" class="form-control">
            @if ($profile->artwork2)
                <img src="{{ asset('storage/' . $profile->artwork2) }}" alt="Artwork 2" class="img-thumbnail mt-2">
            @endif
        </div>
        <div class="form-group">
            <label for="artwork3">Artwork 3</label>
            <input type="file" name="artwork3" id="artwork3" class="form-control">
            @if ($profile->artwork3)
                <img src="{{ asset('storage/' . $profile->artwork3) }}" alt="Artwork 3" class="img-thumbnail mt-2">
            @endif
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection