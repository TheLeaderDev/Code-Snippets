<h1 align="center">Usage Guide for shamsi_dateTime() Function</h1>
<p align="center">This function converts the system or server Gregorian date and time into the Persian (Solar Hijri) calendar.
Using this function, you can easily retrieve the year, month, day, hour, minute, second, and even the names of months and weekdays in Persian.</p>

<h4 align="center">Give me some energy ⭐ by starring this repo, thank you!</h4>
<br>
<h1 align="left">How to Use</h1>
<h5>Add the file to your project:</h5>

```
include 'shamsi_dateTime.php';
```
<h5>Call the function:</h5>

```
$dataTime = shamsi_dateTime();
```

<h5>Access the output values:</h5>

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

## License Notice

The `LICENSE` file is included alongside this code.  
You must include and respect it when using this code,  
and give proper credit to the original author (`AmIR / TheLeaderDev`).  
Ignoring the license may violate copyright.
