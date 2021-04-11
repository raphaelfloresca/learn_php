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
        // Define a function and pass default parameters
        function addNumbers($num_1=0, $num_2=0) {
            return $num_1 + $num_2;
        }
        printf("5 + 4 = %d <br>", addNumbers(5, 4));

        // Function parameters are passed by value
        function changeMe($change) {
            $change = 10;
        }
        $change = 5;
        changeMe($change);
        echo "Change : $change <br>";

        // But they can also be passed by reference
        function changeMeReference(&$change) {
            $change = 10;
        }
        changeMeReference($change);
        echo "Change : $change <br>";
        
        // Pass an unknown number of arguments to a function
        function getSum(...$nums) {
            $sum = 0;
            foreach ($nums as $num) {
                $sum += $num;
            }
            return $sum;
        }
        printf("Sum = %d<br>", getSum(1, 2, 3, 4));

        // Return multiple values in a function 
        function doMath($x, $y) {
            return array(
                $x + $y,
                $x - $y
            );
        }
        list($sum, $difference) = doMath(5, 4);
        echo "Sum = $sum<br>";
        echo "Difference = $difference<br>";

        // Apply a function to all the values of an array 
        function double($x) {
            return $x * $x;
        }
        $list = [1, 2, 3, 4];
        $dbl_list = array_map('double', $list);

        // Print a human-readable varsion of an array 
        print_r($dbl_list);
        echo '<br>';

        // Apply function iteratively to all elements in an array 
        function mult($x, $y) {
            $x *= $y;
            return $x;
        }

        // List can be initialised like this 
        $list = [1, 2, 3, 4];
        $prod = array_reduce($list, 'mult', 1);
        print_r($prod);
        echo '<br>';

        // Filter list according to a function which returns a boolean 
        function isEven($x) {
            return ($x % 2) == 0;
        }
        $even_list = array_filter($list, 'isEven');

        print_r($even_list);
    ?>
</body>
</html>