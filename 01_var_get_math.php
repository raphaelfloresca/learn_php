<?php
    // Initialise variables 
    $f_name = "Derek";
    $l_name = "Banas";
    $age = 44;
    $height = 1.87;
    $can_vote = true;

    // Initialise arrays 
    $address = array(
        'street' => '123 Main Street',
        'city' => 'Pittsburgh');

    // Initialise null values 
    $state = NULL;

    // Initiliase constants 
    define('PI', 3.1415);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Tutorial</title>
</head>
<body>
    <!-- In-line PHP in HTML file, concatenation occurs with .  -->
    <p>Name: <?php echo $f_name . ' ' . $l_name; ?></p>
    <!-- Create a form which uses the get method to pass data from form into a PHP script  -->
    <form action="var_get_math.php" method="get">
        <label for="state">Your State: </label>
        <input type="text" name="state" id="state"><br>
        
        <label for="num-1">Number 1: </label>
        <input type="text" name="num-1" id="num-1"><br>

        <label for="num-2">Number 2: </label>
        <input type="text" name="num-2" id="num-2"><br>

        <input type="submit" value="Submit">
    </form>
    <?php
        // The get method returns an array with keys which correspond to a form input's name attribute
        // This checks whether the get array has been set and whether the state value has been passed
        if (isset($_GET) && array_key_exists('state', $_GET)) {
            // Initialise $state based on value from get array 
            $state = $_GET['state'];
            // Checks if $state is set and not empty 
            if (isset($state) && !empty($state)) {
                // echo prints to the browser
                echo 'You live in ' . $state . '<br>';
                // Double quotes used to embed PHP variables when using echo 
                echo "$f_name lives in $state <br>";
            }
        }
        // Checks if all values from form have been passed 
        if (count($_GET) >= 3) {
            $num_1 = $_GET['num-1'];
            $num_2 = $_GET['num-2'];
            // Addition
            echo "$num_1 + $num_2 = " . ($num_1 + $num_2) . '<br>';
            // Subtraction
            echo "$num_1 - $num_2 = " . ($num_1 - $num_2) . '<br>';
            // Multiplication
            echo "$num_1 * $num_2 = " . ($num_1 * $num_2) . '<br>';
            // Division 
            echo "$num_1 / $num_2 = " . ($num_1 / $num_2) . '<br>';
            // Modulus
            echo "$num_1 % $num_2 = " . ($num_1 % $num_2) . '<br>';
            // Integer division 
            echo "$num_1 / $num_2 = " . (intdiv($num_1, $num_2)) . '<br>';

            // Print then increment 
            echo "Increment $num_1 = " . ($num_1++) . "<br>";
            // Print then decrement
            echo "Decrement $num_1 = " . ($num_1--) . "<br>";
            // Absolute value 
            echo "abs(-5) = " . abs(-5) . "<br>";

            // Ceiling function 
            echo "ceil(4.45) = " . ceil(4.45) . "<br>";

            // Floor function 
            echo "floor(4.45) = " . floor(4.45) . "<br>";
            
            // Round number up or down 
            echo "round(4.45) = " . round(4.45) . "<br>";
            
            // Find max of two numbers 
            echo "max(4, 5) = " . max(4, 5) . "<br>";
            
            // Find min of two numbers 
            echo "min(4, 5) = " . min(4, 5) . "<br>";
            
            // Raise first parameter to the power of the second parameter 
            echo "pow(4, 2) = " . pow(4, 2) . "<br>";
            
            echo "exp(1) = " . exp(1) . "<br>"; // exponent of e
            
            // Logarithm of parameter 
            echo "log(e) = " . log(exp(1)) . "<br>";
            
            // Log base 10 of parameter 
            echo "log10(10) = " . log10(exp(1)) . "<br>";
            
            // pi is defined in PHP 
            echo "PI = " . pi() . "<br>";
            
            // Find hypotenuse of parameters 
            echo "hypot(10, 10) = " . hypot(10, 10) . "<br>";
            
            // Convert from degrees to radians 
            echo "deg2rad(90) = " . deg2rad(90) . "<br>";
            
            // Convert from radians to degrees 
            echo "rad2deg(1.57) = " . rad2deg(1.57) . "<br>";
            
            // Random number generator (new) 
            echo "mt_rand(1, 50) = " . mt_rand(1, 50) . "<br>";
            
            // Random number generator (old)
            echo "rand(1, 50) = " . rand(1, 50) . "<br>";
            
            // Returns the maximum value that can be returned by a call to mt_rand() 
            echo "Max Random = " . mt_getrandmax() . "<br>";
            
            // Checks if number is finite 
            echo "is_finite(10) = " . is_finite(10) . "<br>";
            
            // Checks if number is infinite 
            echo "is_infinite(log(0)) = " . is_infinite(log(0)) . "<br>";
            
            // Checks if string contains a number 
            echo "is_numeric(\"10\") = " . is_numeric("10") . "<br>";
            
            // Sin function 
            echo "sin(0) = " . sin(0) . "<br>";

            // Format number to n decimal places 
            echo number_format(12345.6789, 2) . "<br>";
        }
    ?>
</body>
</html>