<?php

namespace App\Enums;

use Spatie\Enum\Laravel\Enum;

/**
 * @method static self ONCE()
 * @method static self PERIODICALLY()
 * @method static self SEASON()
 * @method static self CONSTANT()
 */
final class EventTypeEnum extends Enum {
    public static function optionsForLivewire(): array
    {
        return collect(self::cases())
            ->map(fn (self $enum) => $enum->toLivewire())
            ->toArray();
    }
}
