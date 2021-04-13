<!-- Delete student in the database -->
<?php
    // Validate the input from the post method
    $student_id = filter_input(INPUT_POST, "student-id", FILTER_VALIDATE_INT);
    
    // Check that student_id has been entered
    if ($student_id == null) {
        $err_msg = "All Values Not Entered<br>";
        include('db_error.php');
    } else {
        // Check if already included
        require_once('db_connect.php');
        // SQL query to delete the corresponding row of the students database
        $query = 'DELETE from students WHERE student_id = :student_id';

        // Create an object based on the db class and prepare the query variable for binding
        $stm = $db->prepare($query);
        // Bind the SQL values to the PHP variables
        $stm->bindValue(':student_id', $student_id);
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

    <!-- Delete Student -->
    <h2>Delete Student</h2>

    <form action="delete_student.php" method="post" id="delete-student-form">
        <label for="student-id">Student ID: </label>
        <input type="text" name="student-id" id="student-id"><br>
        <input type="submit" value="Delete Student">
    </form>
</body>
</html>