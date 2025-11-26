<?php

// Converts the system/server Gregorian date to Persian (Shamsi).
// Include this file in your project, call the function,
// and access the output array using the provided keys.

function getDetaTimeShamsi(array $options = []): array
{
    // Default settings
    $defaults = [
        'timezone' => 'Asia/Tehran',
        'latinDigits' => true,
        'timestamp' => time(),
    ];
    $opt = array_merge($defaults, $options);

    date_default_timezone_set($opt['timezone']);

    // Formatter for date and time
    $locale = $opt['latinDigits']
        ? 'fa_IR@calendar=persian;numbers=latn'
        : 'fa_IR@calendar=persian;numbers=arabext';

    $fmtDate = new IntlDateFormatter($locale, IntlDateFormatter::FULL, IntlDateFormatter::NONE, $opt['timezone'], IntlDateFormatter::TRADITIONAL, "yyyy/MM/dd");
    $fmtTime = new IntlDateFormatter($locale, IntlDateFormatter::NONE, IntlDateFormatter::MEDIUM, $opt['timezone'], IntlDateFormatter::TRADITIONAL, "HH:mm:ss");

    $dateStr = $fmtDate->format($opt['timestamp']);
    $timeStr = $fmtTime->format($opt['timestamp']);

    // If ICU is old and numbers=latn didn't work
    if ($opt['latinDigits'] && preg_match('/[۰-۹]/u', $dateStr.$timeStr)) {
        $persian = ['۰','۱','۲','۳','۴','۵','۶','۷','۸','۹'];
        $english = ['0','1','2','3','4','5','6','7','8','9'];
        $dateStr = str_replace($persian, $english, $dateStr);
        $timeStr = str_replace($persian, $english, $timeStr);
    }

    // Splitting date and time
    [$year, $month, $day] = explode('/', $dateStr);
    [$hour, $minute, $second] = explode(':', $timeStr);

    // Array of full names for weekdays and months
    $weekdaysFull = ['شنبه','یکشنبه','دوشنبه','سه‌شنبه','چهارشنبه','پنجشنبه','جمعه'];
    $monthsFull = ['فروردین','اردیبهشت','خرداد','تیر','مرداد','شهریور','مهر','آبان','آذر','دی','بهمن','اسفند'];

    // Calculating the index of the weekday and month
    $weekdayIndex = (int) date('w', $opt['timestamp']); 
    $monthIndex = (int)$month - 1;

    // Complete output array
    return [
        'year' => $year,
        'month' => $month,
        'day' => $day,
        'hour' => $hour,
        'minute' => $minute,
        'second' => $second,
        'date' => "$year/$month/$day",
        'time' => "$hour:$minute:$second",
        'datetime' => "$year/$month/$day $hour:$minute:$second",
        'weekday' => $weekdaysFull[$weekdayIndex],
        'month_name' => $monthsFull[$monthIndex],
    ];
}
