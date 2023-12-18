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
        // Create function which throws an error if something goes wrong 
        function badDivide($num) {
            if ($num == 0) {
                throw new Exception("You can't divide by zero");
            }
            return $calc = 100 / $num;
        }

        // Structure of try/catch block 
        try {
            badDivide(0);
        } catch (Exception $e) {
            // Get error message thrown by exception 
            echo "Exception : " . $e -> getMessage();
        }
    ?>
</body>
</html>