<?php

namespace App\Enums;

enum LetterType
{
    case INCOMING;
    case OUTGOING;
    case BACKTRACK;

    public function type(): string
    {
        return match ($this) {
            self::INCOMING => 'incoming',
            self::OUTGOING => 'outgoing',
            self::BACKTRACK => 'backtrack',
        };
    }
}
