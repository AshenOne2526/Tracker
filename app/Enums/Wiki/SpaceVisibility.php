<?php

namespace App\Enums\Wiki;

enum SpaceVisibility: string
{
    /** Every authenticated user may read the space */
    case Open = 'open';

    /** Only members of the space may read it. */
    case Restricted = 'restricted';

    public function label(): string
    {
        return match ($this) {
            self::Open => 'Open to everyone',
            self::Restricted => 'Members only',
        };
    }
}
