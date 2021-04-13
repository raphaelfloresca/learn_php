<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="sanitising_data_1.php" method="post">
        <label for="email">Email: </label>
        <input type="text" name="email" id="email"><br>
        <label for="num1">Number 1: </label>
        <input type="text" name="num1" id="num1"><br>
        <label for="num2">Number 2: </label>
        <input type="text" name="num2" id="num2"><br>
        <label for="website">Website: </label>
        <input type="text" name="website" id="website"><br>
        <input type="submit" value="Submit">
    </form>

    <?php
        // post method doesn't store values in the url, better for security
        if (isset($_POST['email'])) {
            // Get the email value from post method and validate whether this is an email 
            if (!filter_input(INPUT_POST, "email", FILTER_VALIDATE_EMAIL)) {
                echo "Email isn't valid<br>";
            } else {
                echo "Email is valid<br>";
            }
        }
        // Two ways of checking whether a value is set 
        if (isset($_POST["num1"]) && !empty($_POST["num2"])) {
            // Sanitize input as float 
            $num1 = filter_input(INPUT_POST, "num1", FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
            $num2 = filter_input(INPUT_POST, "num2", FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
            // Prints output to string 
            $output = sprintf("%.1f + %.1f = %.1f", $num1, $num2, ($num1 + $num2));
            // Converts any special chars to HTML, used to protect against cross-site attacks  
            echo htmlspecialchars($output) . "<br>";
        }
        // Validate URL 
        if (isset($_POST["website"])) {
            $website = filter_input(INPUT_POST, "website", FILTER_VALIDATE_URL);
            echo 'Website : ' . htmlspecialchars($website) . '<br>';
        }
        // See more validations at: https://www.php.net/manual/en/filter.filters.validate.php
        // See more sanitizations at: https://www.php.net/manual/en/filter.filters.sanitize.php

        $con_html = '<a href="#"><b>Sample</b></a>';
        // Echoing a string with HTML tags will make the HTML tags work 
        echo $con_html . '<br>';

        // Convert special characters to be able to see HTML code in the browser 
        echo htmlspecialchars($con_html) . '<br>';

        // Remove all tags except the <a> tag 
        echo strip_tags($con_html, '<a>') . '<br>';

        // Remove all tags 
        echo strip_tags($con_html) . '<br>';
    ?>
</body>
</html>