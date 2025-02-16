<?php

use Livewire\Volt\Component;

new class extends Component {

    use \Livewire\WithFileUploads;

    #[\Livewire\Attributes\Validate('required', 'string', 'max:255')]
    public string $title;

    #[\Livewire\Attributes\Validate('required', 'string')]
    public string $description;

    #[\Livewire\Attributes\Validate('required', 'string')]
    public string $type;

    #[\Livewire\Attributes\Validate('required', 'string')]
    public string $location_type;

    #[\Livewire\Attributes\Validate('nullable', 'string', 'date', 'after:today')]
    public ?string $date_start = null;

    #[\Livewire\Attributes\Validate('nullable', 'string', 'date', 'after:date_start')]
    public ?string $date_end = null;

    #[\Livewire\Attributes\Validate('nullable', 'array')]
    public ?array $media = [];

    public function mount() {
//        dd(\App\Enums\EventLocationTypeEnum::optionsForLivewire());
    }
    public function submit()
    {
        $this->validate();

        /** @var \App\Models\Event $event */
        $event = \App\Models\Event::query()->create([
            ...$this->only([
                'title',
                'description',
                'type',
                'date_start',
                'date_end',
            ]),
            'user_id' => \Illuminate\Support\Facades\Auth::id(),
            'status' => \App\Enums\EventStatusEnum::PREVIEW(),
        ]);

//        if (filled($this->event_categories)) {
//            collect($this->event_categories)->each(function($category) use ($event) {
//                $category = Category::query()->firstOrCreate([
//                    'name' => $category,
//                ]);
//                $event->categories()->attach($category);
//            });
//        }
//
//        if ($this->location_type === \App\Enums\EventLocationTypeEnum::LOCAL()->value) {
//            EventLocation::query()->firstOrCreate([
//                'event_id' => $event->id,
//                'location_type' => $this->location_type,
//                'country' => $this->country,
//                'city' => $this->city,
//                'address' => $this->address,
//                'additional_information' => $this->additional_information,
//            ]);
//        }

        if (filled($this->media)) {
            collect($this->media)->each(function ($media) use ($event) {
                $event->addMedia($media)->toMediaCollection();
            });
        }

        redirect(route('events.list'));
    }
}; ?>


<div class="bg-gray-100 p-6 rounded-lg shadow-md">
    <form wire:submit.prevent="submit" >
        <div class="space-y-12">
            <x-input wire:model="title" label="{{__('event.title')}}" />
            <x-textarea wire:model="description" label="{{__('event.description')}}"/>
            <x-select icon="clock" wire:model="type" label="{{__('event.type')}}" placeholder="{{__('event.type')}}"
                :options="\App\Enums\EventTypeEnum::optionsForLivewire()" option-label="label" option-value="value"
            />
            <x-select icon="map-pin" wire:model="location_type" label="{{__('event.select_location_type')}}" placeholder="{{__('event.select_location_type')}}"
                :options="\App\Enums\EventLocationTypeEnum::optionsForLivewire()" option-label="label" option-value="value"
            />
    {{--        <x-select--}}
    {{--            label="{{__("event.select_category")}}"--}}
    {{--            placeholder="{{__("event.select_category")}}"--}}
    {{--            multiselect--}}
    {{--            :async-data="route('api.categories')"--}}
    {{--            option-label="name"--}}
    {{--            option-value="id"--}}
    {{--        />--}}
            <x-input wire:model="date_start" icon="calendar" type="date" label="{{__('event.date_start')}}"/>
            <x-input wire:model="date_end" icon="calendar" type="date" label="{{__('event.date_end')}}"/>
            <x-input wire:model="media" multiple type="file" label="{{__('event.media')}}">
                {{ __('event.add_media') }}
            </x-input>
            <div class="grid grid-cols-3 justify-end pt-4">
                <x-button wire:click="submit" primary right-icon="plus-circle" spinner>{{ __('event.button-create') }}</x-button>
            </div>
            <x-errors />
        </div>
    </form>
</div>
