<?php

use Livewire\Volt\Component;

new class extends Component {
    use \WireUi\Traits\WireUiActions;

    public \App\Models\Event $event;

    public function mount(\App\Models\Event $event)
    {
        $this->event = $event;
    }

    public function confirmSimple(): void
    {
        $this->notification()->confirm([
            'title' => 'Are you Sure?',
            'description' => 'Delete?',
            'acceptLabel' => 'Yes, delete it',
            'method' => 'delete',
        ]);
    }

    public function delete():void {
        $this->event->delete();
    }
}; ?>


<x-card class="grid mt-5" title="{{ $event->title }}" rounded="3xl">
    {{ $event->id }}: {{ $event->description }}
    @if(filled($event->getMedia()))
        <livewire:carousel :event="$event"/>
    @endif

    @if (Route::is('events.list'))
        <x-slot name="footer" class="flex items-center justify-between">
            <x-button icon="trash" label="{{__('event.delete')}}" flat wire:click="confirmSimple" info/>

            <x-button href="{{ route('events.update') }}" wire:navigate label="{{__('event.update')}}" primary />
        </x-slot>
    @endif

</x-card>

