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
        // Structure of switch statement on string 
        $request = "Coke";
        switch ($request) {
            case "Coke":
                echo "Here is your Coke <br>";
                break;
            case "Pepsi":
                echo "Here is your Pepsi <br>";
                break;
            default:
                echo "Here is your water <br>";
                break;
        }

        // Structure of switch statement on boolean 
        $age = 12;
        switch (true) {
            case ($age < 5):
                echo "Stay home <br>";
                break;
            case ($age == 5):
                echo "Go to kindergarten <br>";
                break;
            case (in_array($age, range(6, 17))):
                $grade = $age - 5;
                echo "Go to Grade $grade <br>";
                break;
            default:
                echo "Go to college <br>";
                break;
        }
    ?>
</body>
</html>