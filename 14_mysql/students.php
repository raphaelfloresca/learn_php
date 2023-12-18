<?php
    // Connect to the database using the db_connect file
    require('db_connect.php');
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

    <!-- Insert Student -->
    <h2>Insert Student</h2>

    <form action="add_student.php" method="post" id="add-student-form">
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