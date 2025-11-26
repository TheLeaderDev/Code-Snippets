<h1 align="center">Usage Guide for shamsi_dateTime() Function</h1>
<p align="center">This function converts the system or server Gregorian date and time into the Persian (Solar Hijri) calendar.
Using this function, you can easily retrieve the year, month, day, hour, minute, second, and even the names of months and weekdays in Persian.</p>

<h4 align="center">Give me some energy ⭐ by starring this repo, thank you!</h4>
<br>
<h1 align="left">How to Use</h1>

<a align="left" href="https://github.com/TheLeaderDev/Code-Snippets/tree/main/shamsi-datetime">Download or access the code</a>

<h5 align="left">Add the file to your project:</h5>

```
include 'shamsi_dateTime.php';
```
<h5 align="left">Call the function:</h5>

```
$dataTime = shamsi_dateTime();
```

<h5 align="left">Access the output values:</h5>

```
echo $dataTime['year'];        // Persian year
echo $dataTime['month'];       // Persian month (number)
echo $dataTime['day'];         // Persian day
echo $dataTime['hour'];        // Hour
echo $dataTime['minute'];      // Minute
echo $dataTime['second'];      // Second
echo $dataTime['date'];        // Date in yyyy/mm/dd format
echo $dataTime['time'];        // Time in HH:mm:ss format
echo $dataTime['datetime'];    // Combined date and time
echo $dataTime['weekday'];     // Weekday name (Persian)
echo $dataTime['month_name'];  // Month name (Persian)
```

<h5 align="left">Example Output (Array):</h5>

```
Array
(
    [year] => 1404
    [month] => 08
    [day] => 26
    [hour] => 15
    [minute] => 45
    [second] => 30
    [date] => 1404/08/26
    [time] => 15:45:30
    [datetime] => 1404/08/26 15:45:30
    [weekday] => شنبه
    [month_name] => آبان
)
```

<br>
<br>

<details dir="rtl">
<summary>فارسی (کلیک برای باز کردن)</summary> <br>

<h1 align="center">راهنمای استفاده از تابع shamsi_dateTime()</h1>
<p align="center">این تابع تاریخ و زمان میلادی سیستم یا سرور را به تقویم شمسی (هجری شمسی) تبدیل می‌کند.  
با استفاده از این تابع، می‌توانید به راحتی سال، ماه، روز، ساعت، دقیقه، ثانیه و حتی نام ماه‌ها و روزهای هفته را به زبان فارسی دریافت کنید.</p>

<h4 align="center">با دادن ⭐ به این ریپو انرژی بدهید، ممنون!</h4>
<br>
<h1 align="right">نحوه استفاده</h1>

<a align="right" href="https://github.com/TheLeaderDev/Code-Snippets/tree/main/shamsi-datetime">دانلود یا مشاهدهٔ کد</a>

<h5 align="right">فایل را به پروژه خود اضافه کنید:</h5>

<div dir="ltr">

```
include 'shamsi_dateTime.php';
```
</div>

<h5 align="right">تابع را فراخوانی کنید:</h5>

<div dir="ltr">

```
$dataTime = shamsi_dateTime();
```
</div>

<h5 align="right">دسترسی به مقادیر خروجی:</h5>

<div dir="ltr">
  
```
echo $dataTime['year']; // سال شمسی
echo $dataTime['month']; // ماه شمسی (عدد)
echo $dataTime['day']; // روز شمسی
echo $dataTime['hour']; // ساعت
echo $dataTime['minute']; // دقیقه
echo $dataTime['second']; // ثانیه
echo $dataTime['date']; // تاریخ به صورت yyyy/mm/dd
echo $dataTime['time']; // زمان به صورت HH:mm:ss
echo $dataTime['datetime']; // تاریخ و زمان ترکیبی
echo $dataTime['weekday']; // نام روز هفته 
echo $dataTime['month_name']; // نام ماه 
```

</div>

<h5 align="right">نمونهٔ خروجی (آرایه):</h5>

<div dir="ltr">
  
```
Array
(
    [year] => 1404
    [month] => 08
    [day] => 26
    [hour] => 15
    [minute] => 45
    [second] => 30
    [date] => 1404/08/26
    [time] => 15:45:30
    [datetime] => 1404/08/26 15:45:30
    [weekday] => شنبه
    [month_name] => آبان
)
```

</div>

<br>

</details>
