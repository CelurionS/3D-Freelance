<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>3D Artists</title>
    @vite('resources/css/app.css')

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
        integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        body {
            font-family: 'Arial', sans-serif;
        }

        .post-container {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            justify-content: center;
            margin-top: 50px;
        }

        .post {
            flex: 0 0 calc(33.333% - 20px);
            max-width: calc(33.333% - 20px);
            background: white;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            transition: transform 0.3s, box-shadow 0.3s;
        }

        .post:hover {
            transform: translateY(-10px);
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
        }

        .post img {
            width: 100%;
            height: auto;
            object-fit: cover;
        }

        .post-title {
            font-size: 1.25rem;
            font-weight: bold;
            margin: 15px 10px 5px 10px;
            text-align: center;
            color: #333;
        }

        .post-description {
            padding: 0 10px 15px 10px;
            font-size: 1rem;
            color: #555;
            text-align: justify;
            display: -webkit-box;
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .post-stats {
            display: flex;
            justify-content: space-between;
            padding: 0 15px 10px 15px;
            font-size: 1rem;
            color: #888;
        }

        .post-action {
            text-align: center;
            padding: 15px;
            background: #2a9d8f;
            color: white;
            font-size: 1rem;
            font-weight: bold;
            cursor: pointer;
            transition: background 0.3s;
        }

        .post-action:hover {
            background: #21867a;
        }

        @media screen and (max-width: 768px) {
            .post {
                flex: 0 0 calc(50% - 20px);
                max-width: calc(50% - 20px);
            }
        }

        @media screen and (max-width: 480px) {
            .post {
                flex: 0 0 calc(100% - 20px);
                max-width: calc(100% - 20px);
            }
        }

        nav {
            background-color: #fff;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        nav a {
            color: #333;
            text-decoration: none;
            margin-right: 20px;
        }

        nav a:hover {
            color: #2a9d8f;
        }
    </style>
</head>

<body class="min-h-screen bg-gradient-to-r from-blue-200 to-blue-600">
    <nav class="flex justify-between items-center px-6 py-4 bg-white shadow-md">
        <a href="/home" class="text-blue-600 text-2xl font-bold">Evenside</a>
        <div class="flex items-center">
            @if (Route::has('login'))
            <div class="flex items-center">
                @auth
                <a href="{{ route('profile.show', ['user' => Auth::user()->id]) }}"
                    class="rounded-md px-4 py-2 text-black transition hover:text-black/70 focus:outline-none">Dashboard</a>
                @else
                <a href="{{ route('login') }}"
                    class="rounded-md px-4 py-2 text-black text-xl font-medium mx-2">Sign in</a>
                @if (Route::has('register'))
                <a href="{{ route('register') }}"
                    class="rounded-md px-4 py-2 text-black text-xl font-medium bg-transparent border border-green-500 text-center hover:bg-green-500 hover:text-white">Join</a>
                @endif
                @endauth
            </div>
            @endif
        </div>
    </nav>

    <div class="container mx-auto p-6">
        <div class="post-container">
            @foreach ($posts as $post)
            <a href="{{ route('profile.show', ['user' => $post->user_id]) }}" class="post">
                <img src="{{ Storage::url($post->featured_image) }}" alt="{{ $post->title }}">
                <div class="p-4">
                    <div class="post-title">{{ $post->title }}</div>
                    <div class="post-description">{{ $post->content }}</div>
                    <div class="post-stats">
                        <span><i class="fa fa-star"></i> 4.5</span>
                        <span><i class="fa fa-user"></i> 120</span>
                    </div>
                </div>
                <div class="post-action">
                    Hire Now
                </div>
            </a>
            @endforeach
        </div>
    </div>
</body>

</html>
