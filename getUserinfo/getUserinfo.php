<?php

//==============================================================
//With this class, you can get detailed user information.  
//Just include the file in your project and call UserInfo::get().  

//The information you receive includes: IP address, browser and version, operating system, device type (mobile, tablet, desktop), bot status, dark mode preference, request time, current URL and referrer, and IP geolocation/ISP info (country, region, city, ISP, and local time).
//==============================================================

function getUserInfo(): array {

    // Get IP
    $keys = ['HTTP_CF_CONNECTING_IP','HTTP_X_REAL_IP','HTTP_X_FORWARDED_FOR','REMOTE_ADDR'];
    $ip = 'UNKNOWN';
    foreach ($keys as $key) {
        if (!empty($_SERVER[$key])) {
            $value = $_SERVER[$key];
            $ip = ($key === 'HTTP_X_FORWARDED_FOR') ? explode(',', $value)[0] : $value;
            break;
        }
    }

    // User Agent
    $ua = $_SERVER['HTTP_USER_AGENT'] ?? 'UNKNOWN';

    // Browser
    $browsers = [
        'Edge' => 'Edg\/([0-9\.]+)',
        'Chrome' => 'Chrome\/([0-9\.]+)',
        'Firefox' => 'Firefox\/([0-9\.]+)',
        'Safari' => 'Version\/([0-9\.]+).*Safari'
    ];
    $browser = 'Unknown';
    foreach ($browsers as $name => $pattern) {
        if (preg_match("/$pattern/i", $ua, $m)) { $browser = $name . ' ' . ($m[1] ?? ''); break; }
    }

    // Operating system
    $oses = ['Windows'=>'Windows','Android'=>'Android','iOS'=>'(iPhone|iPad)','MacOS'=>'Mac OS','Linux'=>'Linux'];
    $os = 'Unknown';
    foreach ($oses as $osName => $pattern) if (preg_match("/$pattern/i",$ua)) { $os = $osName; break; }

    // Device
    $device = 'Desktop';
    if (preg_match('/mobile/i',$ua)) $device='Mobile';
    elseif (preg_match('/tablet|ipad/i',$ua)) $device='Tablet';

    // Detect bot (always boolean)
    $bots = ['googlebot','bingbot','slurp','duckduckbot','baiduspider','yandex','sogou','exabot','facebot','ia_archiver'];
    $isBot = false;
    $uaLower = strtolower($ua);
    foreach ($bots as $bot) {
        if(strpos($uaLower,$bot)!==false){
            $isBot = true;
            break;
        }
    }

    // Theme (cookie first, then header, else null)
    $themeValue = null;
    if(!empty($_COOKIE['theme'])){
        $val = strtolower($_COOKIE['theme']);
        if($val==='dark' || $val==='light') $themeValue = $val;
    }
    if($themeValue === null && isset($_SERVER['HTTP_SEC_CH_PREFERS_COLOR_SCHEME'])){
        $val = strtolower($_SERVER['HTTP_SEC_CH_PREFERS_COLOR_SCHEME']);
        if($val==='dark' || $val==='light') $themeValue = $val;
    }

    // Referrer & URL
    $url = $_SERVER['REQUEST_URI'] ?? null;
    $referrer = $_SERVER['HTTP_REFERER'] ?? null;

    // Detailed IP info
    $ipInfo = ['country'=>null,'region'=>null,'city'=>null,'isp'=>null,'localTime'=>null];
    $ch = curl_init();
    curl_setopt($ch,CURLOPT_URL,"https://check-host.net/ip-info?host=" . urlencode($ip));
    curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
    $response = curl_exec($ch);
    curl_close($ch);
    if($response){
        $dom = new DOMDocument();
        @$dom->loadHTML($response);
        $xpath = new DOMXPath($dom);
        $table = $xpath->query('//table')->item(0);
        if($table){
            foreach($table->getElementsByTagName('tr') as $tr){
                $tds = $tr->getElementsByTagName('td');
                if($tds->length==2){
                    $key = trim($tds->item(0)->textContent);
                    $value = trim($tds->item(1)->textContent);
                    if(strpos($key,'Country')!==false) $ipInfo['country']=$value;
                    elseif(strpos($key,'Region')!==false) $ipInfo['region']=$value;
                    elseif(strpos($key,'City')!==false) $ipInfo['city']=$value;
                    elseif(strpos($key,'ISP')!==false || strpos($key,'Org')!==false) $ipInfo['isp']=$value;
                    elseif(strpos($key,'Local time')!==false) $ipInfo['localTime']=$value;
                }
            }
        }
    }

    return [
        'user'=>[
            'ip'=>$ip,
            'browser'=>$browser,
            'os'=>$os,
            'device'=>$device,
            'isBot'=> $isBot, // true / false / null      
            'theme'=> $themeValue, // dark / light / null
            'time'=>date('Y-m-d H:i:s')
        ],
        'request'=>[
            'url'=>$url,
            'referrer'=>$referrer // URL of the previous page or null
        ],
        'ipInfo'=>$ipInfo
    ];
}
