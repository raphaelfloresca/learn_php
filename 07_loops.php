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
        // Structure of while loop 
        $i = 0;
        while ($i < 10) {
            echo ++$i . ', ';
        }
        echo '<br>';

        // Structure of for loop 
        for ($i = 0; $i < 10; $i++) {
            if (($i % 2 == 0)) {
                continue;
            }
            if ($i == 7) break;
            echo $i . ', ';
        }
        echo '<br>';

        // Structure of do-while loop
        $i = 0;
        do {
            echo "Do While : $i <br>";
        } while ($i > 0);
    ?>
</body>
</html>