<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between mb-5">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">{{ $title }}</h2>
            <a href="{{ route('reservations.index') }}" class="bg-green-600 px-4 py-1">All Reservations</a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                    <form action="{{ route('reservations.update',$reservation->id)}}" method="POST">
                        @csrf
                        @method('PATCH')

                        @include('reservations.partials._form', ['buttonText' => __("Update")])
                    </form>
                </div>
            </div>
        </div>
    </div>
    
</x-app-layout>
