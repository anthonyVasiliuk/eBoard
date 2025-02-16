@extends('layouts.auth')

@section('content')
    {{--        class="font-medium text-indigo-600 hover:text-indigo-500 focus:outline-none focus:underline transition ease-in-out duration-150"--}}

   <div class="p-6 mx-auto max-w-7xl lg:p-8">
        <livewire:events.user-list />

        <div class="grid grid-cols-6 justify-end mt-5">
            <x-button primary icon-right="plus" class="mt-6" href="{{ route('events.create') }}" wire:navigate>
                {{__('events.create')}}
            </x-button>
        </div>
   </div>
@endsection
