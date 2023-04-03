<?php
namespace App\Enums;

class ReservationStatusEnums extends Enum
{
    const CONFIRMED = 0;
    const CHECKED_IN = 1;
    const RESCHEDULED = 2;
    const REFUNDED = 3;
    const CANCELLED = 4;
}