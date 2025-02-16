<?php

namespace App\Enums;

use Spatie\Enum\Laravel\Enum;

/**
 * @method static self DRAFT()
 * @method static self PREVIEW()
 * @method static self PUBLISHED()
 * @method static self ARCHIVED()
 */
final class EventStatusEnum extends Enum {}
