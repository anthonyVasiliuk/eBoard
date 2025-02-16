@extends('layouts.auth')

@section('content')
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-600">
            {{ __('Create event') }}
        </h2>
    </x-slot>

    <div class="p-6 mx-auto max-w-3xl lg:p-8">
        <livewire:events.create />
    </div>
@endsection
