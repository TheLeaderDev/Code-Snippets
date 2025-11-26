<h1 align="center">Usage guide for getUserInfo() function</h1>
<p align="center">This function basically tells you everything about the user who visits your site. With it, you can see the user's IP, their browser and version, operating system, device type (mobile, tablet, or desktop), whether they're a bot or not, their dark mode preference, the request time, the current page URL and referrer — and even detailed IP info like their country, region, city, ISP, and local time.</p>

<h4 align="center">Give me some energy ⭐ by starring this repo, thank you!</h4>
<br>
<h1 align="left">How to Use</h1>

<a align="left" href="https://github.com/TheLeaderDev/Code-Snippets/tree/main/getUserinfo">Download or access the code</a>

<h5 align="left">Add the file to your project:</h5>

```
include 'Userinfo.php';
```
<h5 align="left">Call the function:</h5>

```
$info = getUserInfo();
```

<h5 align="left">Access the output values:</h5>

```
print_r($info);
```

<h5 align="left">Example Output (Array):</h5>

```
Array
(
    [user] => Array
        (
            [ip] => 1.1.1.1
            [browser] => Chrome 121.0.0.0
            [os] => Windows
            [device] => Desktop
            [isBot] => false
            [darkMode] => dark
            [time] => 2025-11-26 15:35:12
        )

    [request] => Array
        (
            [url] => /files/getUserinfo.php
            [referrer] => https://leaderdev.info/
        )

    [ipInfo] => Array
        (
            [country] => Australia (AU)
            [region] => Queensland
            [city] => South Brisbane
            [isp] => Cloudflare, Inc.
            [localTime] => 23:05 (+1000) 2025.11.26
        )
)

```

<br>
<br>

<details dir="rtl">
<summary>فارسی (کلیک برای باز کردن)</summary> <br>

<h1 align="center">راهنمای استفاده از تابع getUserInfo()</h1>
<p align="center">این تابع همه چیز رو درباره کاربری که سایتت رو باز کرده بهت میگه. باهاش می‌تونی IP کاربر، مرورگر و نسخه‌اش، سیستم عامل، نوع دستگاه (موبایل، تبلت یا دسکتاپ)، اینکه رباته یا نه، حالت دارک مودش، زمان درخواست، آدرس صفحه فعلی و Referrer، و حتی اطلاعات دقیق IP مثل کشور، منطقه، شهر، ارائه‌دهنده اینترنت و زمان محلی رو ببینی.</p>

<h4 align="center">با دادن ⭐ به این ریپو انرژی بدهید، ممنون!</h4>
<br>
<h1 align="right">نحوه استفاده</h1>

<a align="right" href="https://github.com/TheLeaderDev/Code-Snippets/tree/main/getUserinfo">دانلود یا مشاهدهٔ کد</a>

<h5 align="right">فایل را به پروژه خود اضافه کنید:</h5>

<div dir="ltr">

```
include 'Userinfo.php';
```
</div>

<h5 align="right">تابع را فراخوانی کنید:</h5>

<div dir="ltr">

```
$info = getUserInfo();
```
</div>

<h5 align="right">دسترسی به مقادیر خروجی:</h5>

<div dir="ltr">
  
```
print_r($info);
```

</div>

<h5 align="right">نمونهٔ خروجی (آرایه):</h5>

<div dir="ltr">
  
```
Array
(
    [user] => Array
        (
            [ip] => 1.1.1.1
            [browser] => Chrome 121.0.0.0
            [os] => Windows
            [device] => Desktop
            [isBot] => false
            [darkMode] => dark
            [time] => 2025-11-26 15:35:12
        )

    [request] => Array
        (
            [url] => /files/getUserinfo.php
            [referrer] => https://leaderdev.info/
        )

    [ipInfo] => Array
        (
            [country] => Australia (AU)
            [region] => Queensland
            [city] => South Brisbane
            [isp] => Cloudflare, Inc.
            [localTime] => 23:05 (+1000) 2025.11.26
        )
)

```

</div>

<br>

</details>
