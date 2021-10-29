<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between mb-5">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">{{ $title }}</h2>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h3><strong>Table Name : {{$reservation->name}}</strong></h3>
                    <h4><strong>Capacity : {{$reservation->capacity}} Persons</strong></h4>
                    <form action="{{ route('bookings.store')}}" method="POST">
                        @csrf
                        @include('bookings.partials._form', ['buttonText' => __("Book Now")])
                    </form>
                </div>
            </div>
        </div>
    </div>
    
</x-app-layout>
