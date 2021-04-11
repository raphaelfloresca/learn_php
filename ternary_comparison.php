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
        $age = 12;

        // Structure of ternary operator 
        $can_vote = ($age >= 18) ? "Can vote" : "Can't vote";
        echo "Vote? : $can_vote <br>";

        // Compare value but not data type
        if ("10" == 10) {
            echo "They are equal";
        }

        // Compare both value and data type
        if ("10" === 10) {
            echo "They are equal <br>";
        } else {
            echo "They aren't equal <br>";
        }
    ?>
</body>
</html>