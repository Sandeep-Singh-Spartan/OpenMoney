<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class ActivityLoggerHelper{
    public static function log($activity, $data = [])
    {
        Log::channel('daily_activity_logs')->info($activity, $data);

    }

}
