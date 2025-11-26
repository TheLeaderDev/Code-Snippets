<?php

//==============================================================
// This function fetches detailed IP information from Check-Host.net.  
// Just call getIPinfp($ip) with the IP address you want to look up.  

// The returned array may include: Country, Region, City, ISP/Organization, Local time, and any other info provided by the site.  
// If the request fails, the function returns ["error" => "Failed to fetch data."].  
//==============================================================

function getIPinfp($ip) {
    $url = "https://check-host.net/ip-info?host=" . urlencode($ip);

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, [
        "Accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/avif,image/webp,*/*;q=0.8",
        "Accept-Language: en-US,en;q=0.9,fa;q=0.8",
        "User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36",
        "Upgrade-Insecure-Requests: 1"
    ]);

    $response = curl_exec($ch);
    curl_close($ch);

    if (!$response) return ["error" => "Failed to fetch data."];

    $dom = new DOMDocument();
    @$dom->loadHTML($response);
    $xpath = new DOMXPath($dom);

    $result = [];

    $table = $xpath->query('//table')->item(0);
    if ($table) {
        foreach ($table->getElementsByTagName('tr') as $tr) {
            $tds = $tr->getElementsByTagName('td');
            if ($tds->length == 2) {
                $key = trim(preg_replace("/\s+/", " ", $tds->item(0)->textContent));
                $value = trim(preg_replace("/\s+/", " ", $tds->item(1)->textContent));
                $result[$key] = $value;
            }
        }
    }

    return $result;
}

//================
// How to use
//================

//$info = getIPinfp("1.1.1.1");
//print_r($info);
