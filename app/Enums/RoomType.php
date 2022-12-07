<?php

namespace App\Enums;

enum RoomType: string
{
    case Standard = 'standard';
    case Duplex = 'duplex';
    case Delux = 'delux';
}