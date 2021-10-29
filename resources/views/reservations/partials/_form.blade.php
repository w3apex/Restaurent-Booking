<div class="mb-4">
    <label class="block">Reservation Name</label>
    <input type="text" name="name" value="{{ old('name', isset($reservation) ? $reservation->name : '' )}}" class="focus">
    
    <p class="text-red-600">
        {{ $errors->first('name')}}
    </p>
</div>

<div class="mb-4">
    <label class="block">Capacity</label>
    <input type="text" name="capacity" value="{{ old('capacity', isset($reservation) ? $reservation->capacity : '' )}}" class="focus">
    
    <p class="text-red-600">
        {{ $errors->first('capacity')}}
    </p>
</div>

<div>
    <button class="px-4 py-2 bg-green-600" type="submit">{{ $buttonText }}</button>
</div>