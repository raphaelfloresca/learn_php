<!-- Add student to the database -->
<?php
    // Validate the input from the post method
    $first_name = filter_input(INPUT_POST, "first-name");
    $last_name = filter_input(INPUT_POST, "last-name");
    $email = filter_input(INPUT_POST, "email");
    $street = filter_input(INPUT_POST, "street");
    $city = filter_input(INPUT_POST, "city");
    $state = filter_input(INPUT_POST, "state");
    $zip = filter_input(INPUT_POST, "zip");
    $phone = filter_input(INPUT_POST, "phone");
    $birth_date = filter_input(INPUT_POST, "birth-date");
    $sex = filter_input(INPUT_POST, "sex");
    $lunch_cost = filter_input(INPUT_POST, "lunch-cost", FILTER_VALIDATE_FLOAT);
    // Create a date object for the current time
    $date_entered = date('Y-m-d H:i:s');
    
    // Check that all values have been entered
    if (
        $first_name == NULL || 
        $last_name == NULL || 
        $email == NULL || 
        $street == NULL || 
        $city == NULL || 
        $state == NULL || 
        $zip == NULL || 
        $phone == NULL || 
        $birth_date == NULL || 
        $sex == NULL || 
        $lunch_cost == false) {
            $err_msg = "All Values Not Entered<br>";
            include('db_error.php');

    // Use regular expressions to validate the values
    // Allow uppercase and lowercase characters in a string between 3-30 characters long ($ represents the end of the string)
    } elseif (!preg_match("/[a-zA-Z]{3,30}$/", $first_name)) {
        $err_msg = "First Name Not Valid<br>";
        include('db_error.php');
    } elseif (!preg_match("/[a-zA-Z]{3,30}$/", $last_name)) {
        $err_msg = "Last Name Not Valid<br>";
        include('db_error.php');
    // Validate email using in-built method
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $err_msg = "Email Not Valid<br>";
        include('db_error.php');
    // Allow upper and lower case, numbers 0-9, commas, pound sign, single quote and periods 
    } elseif (!preg_match("/^[a-zA-Z0-9 ,#'\/.]{3,50}$/", $street)) {
        $err_msg = "Street Not Valid<br>";
        include('db_error.php');
    } elseif (!preg_match("/[a-zA-Z\- ]{2,58}$/", $city)) {
        $err_msg = "City Not Valid<br>";
        include('db_error.php');
    // Allow some two-letter combination of the following first characters and the second characters included in the adjacent brackets (corresponds to possible US state combinations)
    } elseif (!preg_match("/^(?:A[KLRZ]|C[AOT]|D[CE]|FL|GA|HI|I[ADLN]|K[SY]|LA|M[ADEINOST]|N[CDEHJMVY]|O[HKR]|PA|RI|S[CD]|T[NX]|UT|V[AT]|W[AIVY])*$/", $state)) {
        $err_msg = "State Not Valid<br>";
        include('db_error.php');
    // Allow some 5 digit number which corresponds to a US zip code 
    } elseif (!preg_match("/[0-9]{5}$/", $zip)) {
        $err_msg = "Zip Code Not Valid<br>";
        include('db_error.php');
    // Allows a valid US phone number format (allowing for a hyphen, space, dot or bracket delimiter), with each section of number checked to make sure it matches the number format 
    } elseif (!preg_match("/(([0-9]{1})*[- .(]*([0-9]{3})[- .)]*[0-9]{3}[- .]*[0-9]{4})+$/", $phone)) {
        $err_msg = "Phone Not Valid<br>";
        include('db_error.php');
    // Checks the date format
    } elseif (!preg_match("/[0-9- ]{8,12}$/", $birth_date)) {
        $err_msg = "Birth Date Not Valid<br>";
        include('db_error.php');
    // Allows for a one-letter input which is either a lower case or an upper case m or f
    } elseif (!preg_match("/[MFmf]{1}$/", $sex)) {
        $err_msg = "Sex Not Valid<br>";
        include('db_error.php');
    } else {
        require_once('db_connect.php');
        // SQL query to insert values into the corresponding columns of the students database
        $query = 'INSERT INTO students (
            first_name, 
            last_name, 
            email, 
            street, 
            city, 
            state, 
            zip, 
            phone, 
            birth_date, 
            sex, 
            date_entered, 
            lunch_cost, 
            student_id) 
            VALUES (
                :first_name, 
                :last_name, 
                :email, 
                :street, 
                :city, 
                :state, 
                :zip, 
                :phone, 
                :birth_date, 
                :sex, 
                :date_entered, 
                :lunch_cost, 
                :student_id)';

        // Create an object based on the db class and prepare the query variable for binding
        $stm = $db->prepare($query);
        // Bind the SQL values to the PHP variables
        $stm->bindValue(':first_name', $first_name);
        $stm->bindValue(':last_name', $last_name);
        $stm->bindValue(':email', $email);
        $stm->bindValue(':street', $street);
        $stm->bindValue(':city', $city);
        $stm->bindValue(':state', $state);
        $stm->bindValue(':zip', $zip);
        $stm->bindValue(':phone', $phone);
        $stm->bindValue(':birth_date', $birth_date);
        $stm->bindValue(':sex', $sex);
        $stm->bindValue(':date_entered', $date_entered);
        $stm->bindValue(':lunch_cost', $lunch_cost);
        // Use the auto-incremented value from MySQL instead of binding a value generated by PHP
        $stm->bindValue(':student_id', null, PDO::PARAM_INT);
        // Execute query
        $execute_success = $stm->execute();
        // Allow for another query to be executed again
        $stm->closeCursor();
        
        // Print an error message if things go wrong
        if (!$execute_success) {
            print_r($stm->errorInfo()[2]);
        } 
    }

    // Connect to database, will check if it has already been included
    require_once('db_connect.php');
    // Regular SQL query to get all student names from the students database
    $query_students = 'SELECT * FROM students ORDER BY student_id';
    // Create a PDO statement object
    $student_statement = $db->prepare($query_students);
    // Execute query
    $student_statement-> execute();
    // Store the executed query in an array
    $students = $student_statement->fetchAll();
    // Allow another SQL statement to be completed by closing current query 
    $student_statement->closeCursor();
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="students.css">
    <title>Document</title>
</head>
<body>
    <h1>Student List</h1>

    <table>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Street</th>
            <th>City</th>
            <th>State</th>
            <th>Zip</th>
            <th>Phone</th>
            <th>BD</th>
            <th>Sex</th>
            <th>Entered</th>
            <th>Lunch</th>
        </tr>
        <!-- Create a foreach block to be able to wrap in-line PHP within HTML-->
        <?php foreach($students as $student) : ?>
            <tr>
                <!-- Get the corresponding data from the student array, which should be structured the same as the MySQL database  -->
                <!-- Keys can be used as indices when getting specific data from a PHP array  -->
                <td><?php echo $student['student_id']; ?></td>
                <td><?php echo $student['first_name'] . ' ' . $student['last_name']; ?></td>
                <td><?php echo $student['email']; ?></td>
                <td><?php echo $student['street']; ?></td>
                <td><?php echo $student['city']; ?></td>
                <td><?php echo $student['state']; ?></td>
                <td><?php echo $student['zip']; ?></td>
                <td><?php echo $student['phone']; ?></td>
                <td><?php echo $student['birth_date']; ?></td>
                <td><?php echo $student['sex']; ?></td>
                <td><?php echo $student['date_entered']; ?></td>
                <td><?php echo $student['lunch_cost']; ?></td>
            </tr>
            <?php endforeach; ?>
    </table>

    <!-- Update Student -->
    <h2>Update Student</h2>

    <form action="update_student.php" method="post" id="update-student-form">
        <!-- Include Student ID input -->
        <label for="student-id">Student ID: </label>
        <input type="text" name="student-id" id="student-id"><br>
        <label for="first-name">First Name: </label>
        <input type="text" name="first-name" id="first-name"><br>
        <label for="last-name">Last Name: </label>
        <input type="text" name="last-name" id="last-name"><br>
        <label for="email">Email: </label>
        <input type="text" name="email" id="email"><br>
        <label for="street">Street: </label>
        <input type="text" name="street" id="street"><br>
        <label for="city">City: </label>
        <input type="text" name="city" id="city"><br>
        <label for="state">State: </label>
        <input type="text" name="state" id="state"><br>
        <label for="zip">Zip Code: </label>
        <input type="text" name="zip" id="zip"><br>
        <label for="phone">Phone: </label>
        <input type="text" name="phone" id="phone"><br>
        <label for="birth-date">Birth Date: </label>
        <input type="text" name="birth-date" id="birth-date"><br>
        <label for="sex">Sex: </label>
        <input type="text" name="sex" id="sex"><br>
        <label for="lunch-cost">Lunch Cost: </label>
        <input type="text" name="lunch-cost" id="lunch-cost"><br>
        <input type="submit" value="Add Student"><br>
    </form>
</body>
</html>