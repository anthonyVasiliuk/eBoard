<?php

use Livewire\Volt\Component;

new class extends Component {
    public function with(): array
    {
        return [
            'events' => \App\Models\Event::query()
                ->where('status', \App\Enums\EventStatusEnum::PUBLISHED())
//                ->where('date_start', '>', \Carbon\Carbon::now())
                ->orderBy('date_start')
                ->get()
        ];
    }
}; ?>

<div class="grid grid-cols-2 pt-7 gap-x-3">
    @if(isset($events) && $events->count())
        @foreach($events as $event)
            <div>
            <livewire:item :event="$event" />
            </div>
        @endforeach
    @endif
</div>
