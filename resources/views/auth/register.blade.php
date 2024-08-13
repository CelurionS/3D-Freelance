<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <title>Document</title>
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
        <div class="center-box">
            <form method="POST" action="{{ route('register') }}" class="w-[411px] h-[519px] bg-gray-300 border border-black/opacity-20 center-box outline outline-1">
                @csrf
                <!-- Name -->
                <div class="mt-4">
                    <label for="name" class="block text-sm font-medium text-gray-700"></label>
                    <input id="name" type="text" placeholder="Name" name="name" class="placeholder-black w-[270px] h-[40px] bg-white border border-black " style="margin-top: 20px; margin-left: 67px;">
                    
                </div>

                <!-- Email Address -->
                <div class="mt-4">
                    <label for="email" class="block text-sm font-medium text-gray-700"></label>
                    <input id="email" type="email" placeholder="Email" name="email" class="placeholder-black w-[270px] h-[40px] bg-white border border-black " style="margin-top: 10px; margin-left: 67px;">
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <!-- Password -->
                <div class="mt-4">
                    <label for="password" class="block text-sm font-medium text-gray-700"></label>
                    <input id="password" type="password" placeholder="Password" name="password" class="placeholder-black w-[270px] h-[40px] bg-white border border-black " style="margin-top: 10px; margin-left: 67px;">
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>

                <!-- Confirm Password -->
                <div class="mt-4">
                    <label for="password_confirmation" class="block text-sm font-medium text-gray-700"></label>
                    <input id="password_confirmation" type="password" placeholder="Password" name="password_confirmation" class="placeholder-black w-[270px] h-[40px] bg-white border border-black " style="margin-top: 10px; margin-left: 67px;">
                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                </div>

                <div class="flex items-center justify-end mt-4">
                    <div style="margin-top: 0px; margin-left: 100px; font-size: 60px;">
                    <button type="submit" class="fa-solid fa-right-to-bracket" {{ __('Register') }}></button>
                    <div class="w-[100px] h-[38px] text-blue-600 text-2xl font-bold font-['Inter']" style="margin-top: -10px; margin-left: 135px;">
                        <div class="w-[234px] h-[21px] text-black text-sm font-medium font-['Inter']" style="margin-top: 30px; margin-left: -190px;">Already Have Even Side Account?
                        </div>
                        <div class="w-[100px] h-[38px] text-blue-600 text-2xl font-bold font-['Inter']" style="margin-top: 10px; margin-left: -140px;"><a href="{{ route('login') }}">{{ __('Sign In') }}</a>
                         </div>   
                </div>
            </form>
        </div>
    </div>
</body>
</html>
