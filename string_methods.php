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
        // Print a formatted string 
        printf("%c %d %.2f %s <br>", 65, 65, 1.234, "string");

        $rand_str = "           Random String       ";
        
        // Get length of string (including whitespace)
        printf("Length: %d <br>", strlen($rand_str));

        // Get length of string (removing left whitespace) 
        printf("Length: %d <br>", strlen(ltrim($rand_str)));

        // Get length of string (removing right whitespace) 
        printf("Length: %d <br>", strlen(rtrim($rand_str)));

        // Get length of string (removing all whitespace) 
        printf("Length: %d <br>", strlen(trim($rand_str)));
        
        // Convert string to uppercase 
        printf("Upper: %s <br>", strtoupper($rand_str));

        // Convert string to lowercase 
        printf("Lower: %s <br>", strtolower($rand_str));

        // Convert string to uppercase 
        printf("Title: %s <br>", ucfirst($rand_str));

        // Get substring of string 
        printf("1st 6: %s <br>", substr(trim($rand_str), 0, 6));

        // Find index of first occurence of substring in string 
        printf("Index: %d <br>", strpos($rand_str, "String"));

        // Replace substring in string 
        $rand_str = str_replace("String", "Characters", $rand_str); 
        printf("Replace : %s <br>", $rand_str);

        // Compare strings 
        printf("A == B : %d <br>", strcmp("A", "B"));
    ?>
</body>
</html>