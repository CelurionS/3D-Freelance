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
                                        <a href="#" class="text-blue-600 hover:bg-blue-300 rounded-md px-2 py-2 text-xl font-bold" aria-current="page">Evenside</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </nav>
        </div>
        <section></section>
        <div class="w-[411px] h-[519px] bg-gray-300 border border-black/opacity-20 center-box outline outline-1">
            <input type="text" placeholder="Email" class="placeholder-black w-[270px] h-[40px] bg-white border border-black " style="margin-top: 40px; margin-left: 67px;">
            <input type="text" placeholder="Password" class="placeholder-black w-[270px] h-[40px] bg-white border border-black " style="margin-top: 20px; margin-left: 67px;">
                <div style="margin-top: 40px; margin-left: 170px; font-size: 60px;">
                <button type="button" name="submit" type="submit"><i class="fa-solid fa-right-to-bracket"></i></button>
                </div>         
            <div class="w-[234px] h-[21px] text-black text-sm font-medium font-['Inter']" style="margin-top: 80px; margin-left: 110px;">Don't have an Evenside account?
            <div class="w-[100px] h-[38px] text-blue-600 text-2xl font-bold font-['Inter']" style="margin-top: 20px; margin-left: 50px;">
                <a href="/register">Sign Up</a>
            </div>

        </div>        
</body>
</html>
