<?php

namespace App\Enums\Room;

enum BedType: string
{
    case Single = 'single';
    case Double = 'double';
    case King = 'king';
    case Queen = 'queen';
}
