<h1 align="center">Usage guide for getChangeData() function</h1>
<p align="center">This function takes any date you give it, no matter the format, and converts it into three main calendars: Shamsi, Gregorian, and Hijri. You can pass a full date string or an array, and it will return a clean, organized array with the year, month, day, formatted output, weekday name, and month title for each calendar—super easy to convert dates back and forth without any hassle.</p>
<p align="center">Very important: This function gets its data from time.ir, so it definitely needs an internet connection. Keep in mind that if the site’s policies or structure change in the future, the function might stop working properly since it depends on that site. But don’t worry—if that happens, I’ll make sure to update the function.</p>

<h4 align="center">Give me some energy ⭐ by starring this repo, thank you!</h4>
<br>
<h1 align="left">How to Use</h1>

<a align="left" href="https://github.com/TheLeaderDev/Code-Snippets/tree/main/getIPinfo">Download or access the code</a>

<h5 align="left">Add the file to your project:</h5>

```
include 'getChangeData.php';
```

<h5 align="left">Call the function:</h5>

<h6 align="left">Using a date string</h6>

```
$result = getChangeData('2004-01-17');
```

<h6 align="left">Or using a date array</h6>

```
$result = getChangeData(['date'=>'2025-11-26']);
```

<h6 align="left">Or using an array with year/month/day</h6>

```
$result = getChangeData(['year'=>1404,'month'=>9,'day'=>5']);
```

<h5 align="left">Access the output values:</h5>

```
print_r($result);
```

<h5 align="left">Example Output (Array):</h5>

```
Array
(
    [shamsi] => Array
        (
            [year] => 1382
            [month] => 10
            [day] => 27
            [ymd] => 1382-10-27
            [weekday] => شنبه
            [month_name] => دی
            [full] => شنبه - 27 - دی
        )

    [gregorian] => Array
        (
            [year] => 2004
            [month] => 01
            [day] => 17
            [ymd] => 2004-01-17
            [weekday] => Saturday
            [month_name] => January
            [full] => Saturday - January - 17 - 2004
        )

    [hijri] => Array
        (
            [year] => 1424
            [month] => 11
            [day] => 24
            [ymd] => 1424-11-24
            [weekday] => ‫السبت‬
            [month_name] => ذوالقعده
            [full] => ‫السبت‬ - 24 - ذوالقعده - 1424
        )

)


```

<br>
<br>

<details dir="rtl">
<summary>فارسی (کلیک برای باز کردن)</summary> <br>

<h1 align="center">راهنمای استفاده از تابع getChangeData()</h1>
<p align="center">این تابع هر تاریخی که بهش بدی، فرقی نمی‌کنه چه فرمتی داشته باشه، برات به سه تقویم اصلی تبدیلش می‌کنه: شمسی، میلادی و هجری. می‌تونی یه رشته تاریخ کامل یا یه آرایه بهش بدی و در خروجی یه آرایه مرتب و تمیز می‌گیری که شامل سال، ماه، روز، خروجی آماده، نام روز هفته و اسم ماه برای هر تقویمه—خیلی راحت می‌تونی تاریخ‌ها رو به هم تبدیل کنی بدون دردسر.</p>
<p align="center">خیلی مهم: این تابع اطلاعات خودش رو از سایت time.ir می‌گیره، پس حتماً اینترنت نیاز داره. یادت باشه که اگه سیاست‌ها یا ساختار سایت در آینده تغییر کنه، ممکنه تابع دیگه درست کار نکنه چون وابسته به اون سایت هست. ولی نگران نباش—اگه این اتفاق بیفته، من هم سعی می‌کنم تابع رو به‌روزرسانی کنم.</p>

<h4 align="center">با دادن ⭐ به این ریپو انرژی بدهید، ممنون!</h4>
<br>
<h1 align="right">نحوه استفاده</h1>

<a align="right" href="https://github.com/TheLeaderDev/Code-Snippets/tree/main/getIPinfo">دانلود یا مشاهدهٔ کد</a>

<h5 align="right">فایل را به پروژه خود اضافه کنید:</h5>

```
include 'getChangeData.php';
```

<h5 align="right">تابع را فراخوانی کنید:</h5>

<h6 align="right">استفاده از یک رشته تاریخ</h6>

```
$result = getChangeData('2004-01-17');
```

<h6 align="right">یا استفاده از یک آرایه تاریخ</h6>

```
$result = getChangeData(['date'=>'2025-11-26']);
```

<h6 align="right">یا استفاده از یک آرایه شامل سال/ماه/روز</h6>

```
$result = getChangeData(['year'=>1404,'month'=>9,'day'=>5']);
```

<h5 align="right">دسترسی به مقادیر خروجی:</h5>

```
print_r($result);
```

<h5 align="right">نمونهٔ خروجی (آرایه):</h5>

<div dir="ltr">

```
Array
(
    [shamsi] => Array
        (
            [year] => 1382
            [month] => 10
            [day] => 27
            [ymd] => 1382-10-27
            [weekday] => شنبه
            [month_name] => دی
            [full] => شنبه - 27 - دی
        )

    [gregorian] => Array
        (
            [year] => 2004
            [month] => 01
            [day] => 17
            [ymd] => 2004-01-17
            [weekday] => Saturday
            [month_name] => January
            [full] => Saturday - January - 17 - 2004
        )

    [hijri] => Array
        (
            [year] => 1424
            [month] => 11
            [day] => 24
            [ymd] => 1424-11-24
            [weekday] => ‫السبت‬
            [month_name] => ذوالقعده
            [full] => ‫السبت‬ - 24 - ذوالقعده - 1424
        )

)


```
</div>


</div>

<br>

</details>
