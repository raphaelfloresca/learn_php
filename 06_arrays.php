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
        // Define an array and get an value from it 
        $friends = array('Joy', 'Willow', 'Ivy');
        echo "Wife : $friends[0] <br>";
        
        // Add a new value to an array 
        $friends[3] = "Steve";

        // Print each entry of an array 
        foreach ($friends as $f) {
            printf("Friend : %s <br>", $f);
        }

        // Define an array with keys 
        $me_info = array(
            "Name" => "Derek",
            "Street" => "123 Main" 
        );

        // Print all keys and values for an array with keys 
        foreach ($me_info as $k => $v) {
            printf("%s : $s <br>, $k, $v");
        }

        // Add arrays together
        $friends_2 = array("Doug");
        $friends = $friends + $friends_2;

        // Sort arrays in ascending order
        sort($friends);
        foreach ($friends as $f) {
            echo "$f,<br>";
        }

        // Sort arrays in descending order 
        rsort($friends);
        foreach ($friends as $f) {
            echo "$f,<br>";
        }

        // Sort arrays by value (in ascending order) 
        asort($me_info);
        foreach ($me_info as $i) {
            echo "$i,<br>";
        }
        
        // Sort arrays by key (in ascending order) 
        ksort($me_info);
        foreach ($me_info as $i) {
            echo "$i,<br>";
        }

        // asort and ksort can be sorted in descending order by arsort and krsort 

        // Define a multidimensional array 
        $customers = array(
            array("Derek", "123 Main"),
            array("Sally", "122 Main")
        );

        // Loop through a multidimensional array 
        for ($row = 0; $row < 2; $row++) {
            for ($col = 0; $col < 2; $col++) {
                echo $customers[$row][$col] . ", ";
            }
            echo "<br>";
        }

        // Turn a string into an array 
        $let_str = "A B C D";
        $let_arr = explode(" ", $let_str);
        foreach ($let_arr as $l) {
            printf("Letter : %s<br>", $l);
        }

        // Turn an array into a string 
        $let_str_2 = implode(" ", $let_arr);
        echo "String : $let_str_2 <br>";

        // Check if a key exists in an array  
        printf("Key Exists : %d<br>", array_key_exists("Name", $me_info));

        // Check if a value exists in an array
        printf("In Array : %d<br>", in_array("Joy", $friends));
    ?>
</body>
</html>