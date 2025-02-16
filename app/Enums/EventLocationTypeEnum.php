<?php

namespace App\Enums;

use Spatie\Enum\Laravel\Enum;

/**
 * @method static self LOCAL()
 * @method static self ONLINE()
 */
final class EventLocationTypeEnum extends Enum {
    public static function optionsForLivewire(): array
    {
        return collect(self::cases())
            ->map(fn (self $enum) => $enum->toLivewire())
            ->toArray();
    }
}
