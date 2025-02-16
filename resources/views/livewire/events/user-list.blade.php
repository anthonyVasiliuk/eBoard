<?php

use Livewire\Volt\Component;

new class extends Component {
    public function with(): array
    {
        return [
            'events' => auth()->user()->events
        ];
    }
}; ?>

<div class="grid grid-cols-2 pt-7 gap-x-3">
    @if(filled($events))
        @foreach($events as $event)
            <livewire:item :event="$event" />
        @endforeach
    @endif
</div>
