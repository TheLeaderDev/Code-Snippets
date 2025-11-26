<?php

// This function is for date conversion
// Using this function, you can convert any date to Shamsi (Jalali), Gregorian, and Hijri
// Just include this file in your project and call the changeData() function

function getChangeData($input) {
    $TIMEIR_API_URL = 'https://api.time.ir/v1/time/fa/time/convertdate';
    $X_API_KEY = 'ZAVdqwuySASubByCed5KYuYMzb9uB2f7';

    // Parse Input
    $year = $month = $day = null;

    if (is_array($input)) {
        if (isset($input['year'], $input['month'], $input['day'])) {
            $year = (int)$input['year'];
            $month = (int)$input['month'];
            $day = (int)$input['day'];
        } elseif (isset($input['date'])) {
            $p = preg_split('/[\/\-\.]+/', $input['date']);
            if(count($p) >= 3) { $year=(int)$p[0]; $month=(int)$p[1]; $day=(int)$p[2]; }
        }
    } elseif (is_string($input)) {
        $p = preg_split('/[\/\-\.]+/', $input);
        if(count($p) >= 3) { $year=(int)$p[0]; $month=(int)$p[1]; $day=(int)$p[2]; }
    }

    if (!$year || !$month || !$day) return ['error'=>'invalid_input'];

    // Guess base
    if ($year >= 1700) $bases = [1,0,2];
    elseif ($year >= 1300) $bases = [0,1,2];
    else $bases = [2,0,1];

    // Call API 
    $final = null;
    foreach($bases as $b) {
        $payload = json_encode(['current_base'=>$b,'year'=>$year,'month'=>$month,'day'=>$day]);
        $ch = curl_init($TIMEIR_API_URL);
        curl_setopt_array($ch, [
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_POST => true,
            CURLOPT_POSTFIELDS => $payload,
            CURLOPT_HTTPHEADER => [
                'Accept: application/json, text/plain, */*',
                'Content-Type: application/json',
                'Origin: https://www.time.ir',
                "x-api-key: $X_API_KEY"
            ]
        ]);
        $res = curl_exec($ch);
        curl_close($ch);

        $data = json_decode($res,true);
        if ($data && isset($data['data']['date_list'])) {
            $final = $data;
            break;
        }
    }

    if (!$final) return ['error'=>'conversion_failed'];

    // Format Output as clean array
    $out = ['shamsi'=>null, 'gregorian'=>null, 'hijri'=>null];
    foreach($final['data']['date_list'] as $d) {
        $y = strval($d['year']);
        $m = str_pad($d['month'],2,'0',STR_PAD_LEFT);
        $da = str_pad($d['day'],2,'0',STR_PAD_LEFT);
        $ymd = "$y-$m-$da";
        $weekday = $d['day_title'];
        $month_name = $d['month_title'];

        switch($d['date_type']){
            case 'jalali':
                $out['shamsi'] = [
                    'year'=>$y, 'month'=>$m, 'day'=>$da,
                    'ymd'=>$ymd, 'weekday'=>$weekday, 'month_name'=>$month_name,
                    'full'=>"$weekday - $da - $month_name"
                ];
                break;
            case 'gregorian':
                $out['gregorian'] = [
                    'year'=>$y, 'month'=>$m, 'day'=>$da,
                    'ymd'=>$ymd, 'weekday'=>$weekday, 'month_name'=>$month_name,
                    'full'=>"$weekday - $month_name - $da - $y"
                ];
                break;
            case 'hijri':
                $out['hijri'] = [
                    'year'=>$y, 'month'=>$m, 'day'=>$da,
                    'ymd'=>$ymd, 'weekday'=>$weekday, 'month_name'=>$month_name,
                    'full'=>"$weekday - $da - $month_name - $y"
                ];
                break;
        }
    }

    return $out;
}
