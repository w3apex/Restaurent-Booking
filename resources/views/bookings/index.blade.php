<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between mb-5">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Manage Bookings</h2>
            {{-- <a href="" class="bg-green-600 px-4 py-1"></a> --}}
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="table w-full">
                        <div class="table-row bg-gray-200">
                            <div class="table-cell p-2">
                                <div>SL.</div>
                            </div>
                            <div class="table-cell p-2">
                                <div>Customer Name</div>
                            </div>
                            <div class="table-cell p-2">
                                <div>Table Name</div>
                            </div>
                            <div class="table-cell p-2">
                                <div>Date</div>
                            </div>
                            <div class="table-cell p-2">
                                <div>Intime Time</div>
                            </div>
                            <div class="table-cell p-2">
                                <div>Out Time</div>
                            </div>
                            <div class="table-cell p-2">
                                <div>Status</div>
                            </div>
                            {{-- <div class="table-cell p-2">
                                <div>Action</div>
                            </div> --}}
                        </div>

                        @forelse ($bookings as $key => $booking)
                            <div class="table-row">

                                <div class="table-cell p-2">
                                    <div>{{$key+1}}</div>
                                </div>

                                <div class="table-cell p-2">
                                    <div>{{$booking->user->name}}</div>
                                </div>

                                <div class="table-cell p-2">
                                    <div>{{$booking->reservation->name}}</div>
                                </div>

                                <div class="table-cell p-2">
                                    <div>{{date('d-m-Y', strtotime($booking->date))}}</div>
                                </div>

                                <div class="table-cell p-2">
                                    <div>{{$booking->in_time}}</div>
                                </div>

                                <div class="table-cell p-2">
                                    <div>{{$booking->out_time}}</div>
                                </div>

                                <div class="table-cell p-2">
                                    {{--<div class="inline-block">{{$booking->status}}</div> --}}
                                    <div class="inline-block">{{ $booking->status ? "Booked" : "Available"}}</div>
                                </div>

                                {{-- <div class="table-cell p-2">
                                    <a href="" class="bg-yellow-500 px-5 py-2">Edit</a>
                                    <a href="" class="bg-red-500 px-5 py-2 delete-row" data-confirm = "Are you sure to delete this?">Delete</a>
                                </div> --}}
                            </div>
                        @empty
                        <div class="table-row">
                            <div class="table-cell p-2">
                                <div class="text-center">{{__('No todo found.')}}</div>
                            </div>
                        </div>
                        @endforelse
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>