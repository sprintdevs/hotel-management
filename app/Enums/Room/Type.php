<?php

namespace App\Enums\Room;

enum Type: string
{
    case Standard = 'standard';
    case Duplex = 'duplex';
    case Delux = 'delux';
}