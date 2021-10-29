<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">

        <style>
            body {
                font-family: 'Nunito', sans-serif;
            }
        </style>
    </head>
    <body class="antialiased">
        <div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">
            @if (Route::has('login'))
                <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                    @auth
                        <a href="{{ url('/dashboard') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Log in</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</a>
                        @endif
                    @endauth
                </div>
            @endif

            <div class="w-full mx-auto sm:px-6 lg:px-8">
   
                <div class="mt-8 bg-white dark:bg-gray-800 overflow-hidden shadow sm:rounded-lg">

                        @guest
                            <div class="bg-white dark:bg-gray-800">
                                <p>For booking ! Please login first ...</p>
                                <a class="px-4 py-2 bg-green-600" href="{{ route('login')}}">Login</a>
                            </div>
                        @else
                            <div class="py-12">
                                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                                        <div class="p-6 bg-white border-b border-gray-200">
                                            <h3><strong>Table Name : {{ $reservation->name}}</strong></h3>
                                            <h4><strong>Capacity : {{ $reservation->capacity}} Persons</strong></h4>

                                            <form action="{{ route('bookings.store')}}" method="POST">
                                                @csrf
                                                
                                                <input type="hidden" name="reservation_id" value="{{ $reservation->id }}" class="focus">

                                                <div class="mb-4">
                                                    <label class="block">Date</label>
                                                    <input type="date" name="date" class="focus">
                                                    <p class="text-red-600">
                                                        {{ $errors->first('date')}}
                                                    </p>
                                                </div>

                                                <div class="mb-4">
                                                    <label class="block">Start Time</label>
                                                    <input type="time" name="in_time" class="focus">
                                                    <p class="text-red-600">
                                                        {{ $errors->first('in_time')}}
                                                    </p>
                                                </div>

                                                <div class="mb-4">
                                                    <label class="block">Out Time</label>
                                                    <input type="time" name="out_time" class="focus">
                                                    <p class="text-red-600">
                                                        {{ $errors->first('out_time')}}
                                                    </p>
                                                </div>

                                                <div>
                                                    <button class="px-4 py-2 bg-green-600" type="submit">Book Now</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endguest
                        
                    </div>
                </div>

            </div>
        </div>
    </body>
</html>
