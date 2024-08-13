@extends('layouts.app')

@section('content')
<div class="container mx-auto p-4">
    <h1 class="text-2xl font-bold">Dashboard</h1>
    <a href="{{ route('profiles.create') }}" class="btn btn-primary">Create Profile</a>
    <div class="mt-4">
        @foreach ($profiles as $profile)
            <div class="card mb-4">
                <img src="{{ asset('storage/' . $profile->picture) }}" alt="{{ $profile->name }}" class="card-img-top">
                <div class="card-body">
                    <h5 class="card-title">{{ $profile->name }}</h5>
                    <p class="card-text">{{ $profile->description }}</p>
                    <div class="artworks">
                        <img src="{{ asset('storage/' . $profile->artwork1) }}" alt="Artwork 1" class="artwork-img">
                        <img src="{{ asset('storage/' . $profile->artwork2) }}" alt="Artwork 2" class="artwork-img">
                        <img src="{{ asset('storage/' . $profile->artwork3) }}" alt="Artwork 3" class="artwork-img">
                    </div>
                    <a href="{{ route('profiles.edit', $profile->id) }}" class="btn btn-primary">Edit</a>
                    <form action="{{ route('profiles.destroy', $profile->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection