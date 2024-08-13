<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @vite('resources/css/app.css')

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        .nav-overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            background-color: rgba(255, 255, 255, 0.8); /* Adjust the opacity as needed */
        }
        .center-box {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
        }
        .custom-input {
            margin-top: 20px;
            margin-left: 67px;
            width: 270px;
            height: 40px;
            background-color: white;
            border: 1px solid black;
            padding: 8px;
            box-sizing: border-box;
        }
    </style>
</head>
<body>
    <div class="bg-[url(https://pbs.twimg.com/media/BjST0txCMAAGGgR?format=jpg&name=medium)] bg-no-repeat bg-cover h-screen relative">
        <div class="nav-overlay">
            <nav class="bg-white">
                <div class="mx-auto max-w-1xl px-4 sm:px-4 lg:px-4">
                    <div class="flex h-11 items-center justify-between">
                        <div class="flex items-center">
                            <div class="flex-shrink-0">
                                <div class="hidden md:block">
                                    <div class="ml-10 flex items-baseline space-x-4">
                                        <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
                                        <a href="/home" class="text-blue-600 hover:bg-blue-300 rounded-md px-2 py-2 text-xl font-bold" aria-current="page">Evenside</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </nav>
        </div>
    </div>
    <div class="center-box">
        <form method="POST" action="{{ route('login') }}" class="w-[411px] h-[519px] bg-gray-300 border border-black/opacity-20 center-box outline outline-1">
            @csrf

            <!-- Email Address -->
            <div>
                <input id="email" class="custom-input" type="email" name="email" placeholder="Email" :value="old('email')" required autofocus autocomplete="username" />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <input id="password" class="custom-input"
                                type="password"
                                name="password"
                                placeholder="Password"
                                required autocomplete="current-password" />

                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <!-- Remember Me -->
            <div class="block mt-4" style="margin-left: 65px">
                <label for="remember_me" class="inline-flex items-center">
                    <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                    <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                </label>
            </div>

            <div class="flex  justify-end mt-4" style="margin-top: -25px;">
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}" >
                        {{ __('Forgot your password?') }}
                    </a>
                @endif
            </div>        
            <div style="margin-top: 50px; margin-left: 180px; font-size: 60px;">
               <button type="submit" class="fa-solid fa-right-to-bracket"></button>
            </div>
         
            <div class="w-[234px] h-[21px] text-black text-sm font-medium font-['Inter']" style="margin-top: 100px; margin-left: 120px;">Don't have an Evenside account?

            </div>
            
            <div class="w-[100px] h-[38px] text-blue-600 text-2xl font-bold font-['Inter']" style="margin-top: 25px; margin-left: 160px;"><a href="{{ route('register') }}">{{ __('Sign Up') }}</a>
            
            </div>
             

        </div>
        </form>
    </div>
</body>
</html>
