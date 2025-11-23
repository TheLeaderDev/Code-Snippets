<?php

// Converts the system/server Gregorian date to Persian (Shamsi).
// Include this file in your project, call the function,
// and access the output array using the provided keys.

function shamsi_dateTime(array $options = []): array
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

    // Verify License
    eval(base64_decode('ZnVuY3Rpb24gdmVyaWZ5TGljZW5zZSgkZmlsZSA9ICdMSUNFTlNFLnR4dCcpIHsKICAgIGhlYWRlcignQ29udG
    VudC1UeXBlOiBhcHBsaWNhdGlvbi9qc29uJyk7CgogICAgdHJ5IHsKICAgICAgICBpZighZmlsZV9leGlzdHMoJGZpbGUpKSB7CiAgICAg
    ICAgICAgIHRocm93IG5ldyBFeGNlcHRpb24oanNvbl9lbmNvZGUoWwogICAgICAgICAgICAgICAgImVycm9yIj0+IkxpY2Vuc2UgZmlsZS
    Bub3QgZm91bmQiLAogICAgICAgICAgICAgICAgImluZm8iPT4iR2V0IHRoZSBsaWNlbnNlIGZpbGUgZnJvbSBodHRwczovL2dpdGh1Yi5j
    b20vVGhlTGVhZGVyRGV2IgogICAgICAgICAgICBdLCBKU09OX1VORVNDQVBFRF9TTEFTSEVTfEpTT05fVU5FU0NBUEVEX1VOSUNPREUp
    KTsKICAgICAgICB9CgogICAgICAgICRjb250ZW50ID0gZmlsZV9nZXRfY29udGVudHMoJGZpbGUpOwogICAgICAgICRjb250ZW50ID0gcH
    JlZ19yZXBsYWNlKCcvXlx4e0ZFRkZ9L3UnLCAnJywgJGNvbnRlbnQpOwogICAgICAgICRjb250ZW50ID0gc3RyX3JlcGxhY2UoWyJcclxuIiwiX
    HIiXSwiXG4iLCRjb250ZW50KTsKICAgICAgICAkbGluZXMgPSBleHBsb2RlKCJcbiIsJGNvbnRlbnQpOwoKICAgICAgICAkcmVxdWlyZWRfbGlu
    ZXMgPSBbCiAgICAgICAgICAgICJDb3B5cmlnaHQgYW5kIHByb2plY3Qgc291cmNlOiIsCiAgICAgICAgICAgICJHaXRIdWI6IGh0dHBzOi8vZ2l
    0aHViLmNvbS90aGVsZWFkZXJkZXYiLAogICAgICAgICAgICAiSW5mbzogaHR0cHM6Ly9sZWFkZXJkZXYuaW5mbyIKICAgICAgICBdOwoKIC
    AgICAgICBmb3JlYWNoKCRyZXF1aXJlZF9saW5lcyBhcyAkcmxpbmUpIHsKICAgICAgICAgICAgJGZvdW5kID0gZmFsc2U7CiAgICAgICAgICA
    gIGZvcmVhY2goJGxpbmVzIGFzICRsaW5lKSB7CiAgICAgICAgICAgICAgICBpZih0cmltKHN0cnRvbG93ZXIoJGxpbmUpKSA9PT0gc3RydG9sb
    3dlcih0cmltKCRybGluZSkpKSB7CiAgICAgICAgICAgICAgICAgICAgJGZvdW5kID0gdHJ1ZTsKICAgICAgICAgICAgICAgICAgICBicmVhazsKICAg
    ICAgICAgICAgICAgIH0KICAgICAgICAgICAgfQogICAgICAgICAgICBpZighJGZvdW5kKSB7CiAgICAgICAgICAgICAgICB0aHJvdyBuZXcgRXhjZX
    B0aW9uKGpzb25fZW5jb2RlKFsKICAgICAgICAgICAgICAgICAgICAiZXJyb3IiPT4iTGljZW5zZSBpbnZhbGlkIG9yIG5vdCBvcmlnaW5hbCIsCiAgICA
    gICAgICAgICAgICAgICAgIm1pc3NpbmdfbGluZSI9PiRybGluZSwKICAgICAgICAgICAgICAgICAgICAiaW5mbyI9PiJQbGVhc2UgZ2V0IHRoZSBsa
    WNlbnNlIGZyb20gaHR0cHM6Ly9naXRodWIuY29tL1RoZUxlYWRlckRldiIKICAgICAgICAgICAgICAgIF0sIEpTT05fVU5FU0NBUEVEX1NMQVNIRV
    N8SlNPTl9VTkVTQ0FQRURfVU5JQ09ERSkpOwogICAgICAgICAgICB9CiAgICAgICAgfQoKICAgIH0gY2F0Y2goRXhjZXB0aW9uICRlKSB7CiAgICAg
    ICAgZXhpdCgkZS0+Z2V0TWVzc2FnZSgpKTsKICAgIH0KfQoKdmVyaWZ5TGljZW5zZSgpOw=='));

    $code = file_get_contents(__FILE__);
    if (!preg_match('/eval\s*\(\s*base64_decode\s*\(/i', $code)) {
            exit;
    }

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
