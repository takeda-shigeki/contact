<form wire:submit.prevent="saveValidation">
    @csrf
    <input wire:model="email" type="text" >
    @error('email') <span class="error">{{ $message }}</span> @enderror

    <input wire:model="postal_code" type="text" >
    @error('postal_code') <span class="error">{{ $message }}</span> @enderror

    <input wire:model="inquiry" type="text" >
    @error('inquiry') <span class="error">{{ $message }}</span> @enderror

    <button type="submit" >Save Validation</button>

    @if (session()->has('message'))
        <div class="text-red-800">
            {{ session('message') }}
        </div>
    @endif
</form>

