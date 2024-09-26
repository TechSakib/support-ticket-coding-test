<?php

namespace App\Services;

use Carbon\Carbon;

class FormatterService
{
    public static function formatDateTime($date_time): string
    {
        return $date_time ? Carbon::parse($date_time)->diffForHumans() : '';
    }
}
