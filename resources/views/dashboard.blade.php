<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Profile</title>
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        .popup {
            position: fixed;
            top: 20%;
            right: -400px;
            width: 300px;
            background-color: white;
            border: 1px solid #ccc;
            padding: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            transition: right 0.3s ease;
        }

        .popup.active {
            right: 20px;
        }

        .package-box {
            width: 250px;
            background-color: white;
            border: 1px solid #ccc;
            padding: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            margin: 10px;
            text-align: center;
            flex: 1;
            transition: transform 0.3s;
        }

        .package-box:hover {
            transform: translateY(-10px);
        }

        .package-box h2 {
            font-size: 1.5rem;
            margin-bottom: 10px;
        }

        .package-box ul {
            text-align: left;
            padding-left: 20px;
            margin-bottom: 10px;
        }

        .package-box ul li {
            margin-bottom: 5px;
        }

        .profile-section {
            display: flex;
            gap: 20px;
            justify-content: center;
            margin-top: 60px;
            flex-wrap: wrap;
        }

        .profile-form {
            flex: 1;
            max-width: 400px;
        }

        .package-selection {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
        }
    </style>
</head>
<body class="bg-gradient-to-r from-blue-200 to-blue-500 min-h-screen">
    <x-app-layout>
        <div class="min-h-screen flex flex-col items-center">
            @if (session('status'))
                <div class="mb-4 font-medium text-sm text-green-600">
                    {{ session('status') }}
                </div>
            @endif

            <div class="profile-section">
                <div class="profile-form bg-white p-6 rounded-lg shadow-lg">
                    <form action="{{ route('dashboard.update') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-4 text-center">
                            <label for="profile_picture_input">
                                <img id="profile_picture_preview" class="w-32 h-32 rounded-full mb-4 cursor-pointer border-2 border-gray-300" src="{{ $user->profile_picture_url }}" alt="Profile Picture">
                            </label>
                            <input type="file" name="profile_picture" id="profile_picture_input" class="hidden" accept="image/*" onchange="previewImage(event)">
                        </div>

                        <div>
                            <h2 class="text-xl font-semibold mb-2">{{ $user->name }}</h2>
                        </div>

                        <div class="mb-4">
                            <label for="description" class="block text-gray-700 text-sm font-bold mb-2">Description:</label>
                            <textarea id="description" name="description" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">{{ $user->description }}</textarea>
                        </div>
                        @if (auth()->user()->id === $user->id)
                        <div class="flex items-center justify-between">
                            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                                Update Profile
                            </button>
                        </div>
                        @endif
                    </form>
                </div>

                <div class="package-selection mt-6">
                    <div class="package-box">
                        <h2 class="font-bold">Basic</h2>
                        <p class="text-xl font-semibold text-gray-700">$10</p>
                        <ul>
                            <li><i class="fas fa-check text-green-500 mr-2"></i>Feature 1</li>
                            <li><i class="fas fa-check text-green-500 mr-2"></i>Feature 2</li>
                            <li><i class="fas fa-check text-green-500 mr-2"></i>Feature 3</li>
                        </ul>
                        <button class="bg-blue-500 text-white font-bold py-2 px-4 rounded hover:bg-blue-700" onclick="selectPackage('Basic', 10)">Select</button>
                    </div>

                    <div class="package-box">
                        <h2 class="font-bold">Standard</h2>
                        <p class="text-xl font-semibold text-gray-700">$50</p>
                        <ul>
                            <li><i class="fas fa-check text-green-500 mr-2"></i>Feature 1</li>
                            <li><i class="fas fa-check text-green-500 mr-2"></i>Feature 2</li>
                            <li><i class="fas fa-check text-green-500 mr-2"></i>Feature 3</li>
                        </ul>
                        <button class="bg-blue-500 text-white font-bold py-2 px-4 rounded hover:bg-blue-700" onclick="selectPackage('Standard', 50)">Select</button>
                    </div>

                    <div class="package-box">
                        <h2 class="font-bold">Premium</h2>
                        <p class="text-xl font-semibold text-gray-700">$100</p>
                        <ul>
                            <li><i class="fas fa-check text-green-500 mr-2"></i>Feature 1</li>
                            <li><i class="fas fa-check text-green-500 mr-2"></i>Feature 2</li>
                            <li><i class="fas fa-check text-green-500 mr-2"></i>Feature 3</li>
                        </ul>
                        <button class="bg-blue-500 text-white font-bold py-2 px-4 rounded hover:bg-blue-700" onclick="selectPackage('Premium', 100)">Select</button>
                    </div>
                </div>
            </div>
            @if (auth()->user()->id === $user->id)

            <div class="w-full max-w-lg mx-auto bg-white p-6 rounded-lg shadow-lg mt-8">
                <h3 class="text-lg font-medium mb-4">Upload Artwork</h3>
                <form action="{{ route('dashboard.uploadArtwork') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-4">
                        <label for="title" class="block text-gray-700 text-sm font-bold mb-2">Title:</label>
                        <input type="text" id="title" name="title" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                    </div>
                    <div class="mb-4">
                        <label for="image" class="block text-gray-700 text-sm font-bold mb-2">Artwork Image:</label>
                        <input type="file" id="image" name="image" accept="image/*" required>
                    </div>
                    <div class="flex items-center justify-between">
                        <button type="submit" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                            Upload Artwork
                        </button>
                    </div>
                </form>
            </div>
            @endif

            <h3 class="text-lg font-medium mb-4 mt-8">3D Artworks</h3>
            <div class="grid grid-cols-1 gap-4 md:grid-cols-2 lg:grid-cols-3 w-full px-4">
                @foreach ($artworks as $artwork)
                <div class="flex flex-col items-center bg-white p-4 rounded-lg shadow-lg">
                    <img class="w-full h-72 mb-2 object-cover rounded-lg" src="{{ asset($artwork->image) }}" alt="{{ $artwork->title }}">
                    <p class="text-gray-700 font-semibold">{{ $artwork->title }}</p>
                </div>
                @endforeach
            </div>
        </div>
    </x-app-layout>

    <div id="popup" class="popup">
        <h3 class="text-xl font-bold mb-2" id="popup_package_name"></h3>
        <p class="text-gray-700 mb-2" id="popup_package_price"></p>
        <button class="bg-blue-500 text-white font-bold py-2 px-4 rounded hover:bg-blue-700" onclick="proceedToCheckout()">Proceed to Checkout</button>
    </div>

    <script>
        function previewImage(event) {
            const reader = new FileReader();
            reader.onload = function() {
                const output = document.getElementById('profile_picture_preview');
                output.src = reader.result;
            }
            reader.readAsDataURL(event.target.files[0]);
        }

        document.getElementById('profile_picture_preview').addEventListener('click', () => {
            document.getElementById('profile_picture_input').click();
        });

        function selectPackage(name, price) {
            document.getElementById('popup_package_name').textContent = name;
            document.getElementById('popup_package_price').textContent = '$' + price;
            document.getElementById('popup').classList.add('active');
        }

        function proceedToCheckout() {
            alert('Proceeding to checkout...');
        }
    </script>
</body>
</html>
