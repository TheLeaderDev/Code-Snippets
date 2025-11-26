<h1 align="center">Usage guide for getIPinfo() function</h1>
<p align="center">This function returns the public information of an IP address. You just need to pass an IP to it, and in the output, you can get details like the country, region, city, ISP/organization, and local time—just like that!</p>
<p align="center">Very important: This function gets its information from the Check Host API, so it definitely needs an internet connection. Keep in mind that if the site's policies change in the future, the function might run into issues since it's dependent on it. But don’t worry—if that happens, I will also try to update the function.</p>

<h4 align="center">Give me some energy ⭐ by starring this repo, thank you!</h4>
<br>
<h1 align="left">How to Use</h1>

<a align="left" href="https://github.com/TheLeaderDev/Code-Snippets/tree/main/getIPinfo">Download or access the code</a>

<h5 align="left">Add the file to your project:</h5>

```
include 'IPinfo.php';
```
<h5 align="left">Call the function:</h5>

```
$info = getIPinfo("1.1.1.1");
```

<h5 align="left">Access the output values:</h5>

```
print_r($info);
```

<h5 align="left">Example Output (Array):</h5>

```
Array
(
    [IP address] => 1.1.1.1
    [Host name] => resolver1.example-dns.net
    [IP range] => 1.1.0.0-1.1.255.255 CIDR
    [ASN] => 13335
    [ISP / Org] => Example Global Network (EGN)
    [Country] => United States (US)
    [Region] => California
    [City] => San Francisco
    [Time zone] => America/Los_Angeles, GMT-0800
    [Local time] => 06:18 (PST) 2025.11.26
    [Postal Code] => 94107
)

```

<br>
<br>

<details dir="rtl">
<summary>فارسی (کلیک برای باز کردن)</summary> <br>

<h1 align="center">راهنمای استفاده از تابع getIPinfo()</h1>
<p align="center">این تابع اطلاعات عمومی یک آدرس IP را برمی‌گرداند. فقط کافی است یک IP به آن پاس بدهید و در خروجی می‌توانید جزئیاتی مثل کشور، منطقه، شهر، ISP/سازمان و زمان محلی را دریافت کنید—به همین راحتی!</p>
<p align="center">خیلی مهم: این تابع  اطلاعات خود را از API سایت Check Host می‌گیرد، بنابراین حتماً به اینترنت نیاز دارد. به یاد داشته باشید که اگر سیاست‌های سایت در آینده تغییر کند، ممکن است تابع دچار مشکل شود چون وابسته به آن است. اما نگران نباشید—اگر این اتفاق بیفتد، من هم سعی می‌کنم تابع را به‌روزرسانی کنم.</p>

<h4 align="center">با دادن ⭐ به این ریپو انرژی بدهید، ممنون!</h4>
<br>
<h1 align="right">نحوه استفاده</h1>

<a align="right" href="https://github.com/TheLeaderDev/Code-Snippets/tree/main/getIPinfo">دانلود یا مشاهدهٔ کد</a>

<h5 align="right">فایل را به پروژه خود اضافه کنید:</h5>

<div dir="ltr">

```
include 'IPinfo.php';
```
</div>

<h5 align="right">تابع را فراخوانی کنید:</h5>

<div dir="ltr">

```
$info = getIPinfo("1.1.1.1");
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
    [IP address] => 1.1.1.1
    [Host name] => resolver1.example-dns.net
    [IP range] => 1.1.0.0-1.1.255.255 CIDR
    [ASN] => 13335
    [ISP / Org] => Example Global Network (EGN)
    [Country] => United States (US)
    [Region] => California
    [City] => San Francisco
    [Time zone] => America/Los_Angeles, GMT-0800
    [Local time] => 06:18 (PST) 2025.11.26
    [Postal Code] => 94107
)

```

</div>

<br>

</details>
