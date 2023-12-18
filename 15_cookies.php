<?php 
    // Set a cookie named my_cookie which contains the value "sample value"
    // time() + 86400 allows the cookie to be set for a day from the time visited
    // time() - 86400 removes the cookie
    // The slash allows the cookie to be accessed from any page on the site
    setcookie("my_cookie", "sample value", time() + 86400, "/");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <!-- Checks if the cookie has been set -->
    <?php 
        if (!isset($_COOKIE["my_cookie"])) {
            echo "Cookie Not Set<br>";
        } else {
            echo "Cookie Value : " . $_COOKIE["my_cookie"] . "<br>";
        }
    ?>
</body>
</html>