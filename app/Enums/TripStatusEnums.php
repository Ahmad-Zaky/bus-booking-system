<?php
namespace App\Enums;

class TripStatusEnums extends Enum
{
    const WAITING = 0;
    const ON_WAY = 1;
    const ARRIVED = 2;
    const RESCHEDULED = 3;
    const CANCELLED = 4;
}