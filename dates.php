<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        // Set default timezone  
        date_default_timezone_set('America/Taipei');
        // Create date according to the following format 
        // I: daylight savings or not
        // F: month in word
        // m: month in numbers
        // d: day of month
        // Y: full year
        // g: 12 hour clock hour
        // m: minute
        // s: seconds
        // A: AM or PM
        echo "Date : " . date('I F m-d-Y g:i:s A') . "<br>";
        // Create a date s-m-h-m-d-Y 
        $import_date = mktime(0, 0, 0, 12, 21, 1974);
        echo "Important Date : " . date('I F m-d-Y g:i:s A', $import_date) . "<br>";
    ?>
</body>
</html>