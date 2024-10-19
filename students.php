<?php
session_start();
include 'db.php';

if (!isset($_SESSION['user_id']) || $_SESSION['role'] != 'admin') {
    header("Location: login.php");
    exit;
}

// Handle adding students
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $student_name = $_POST['student_name'];
    $email = $_POST['email'];
    $roll_id = $_POST['roll_id'];
    $class_id = $_POST['class_id'];
    $section = $_POST['section'];
    $sql = "INSERT INTO students (name, email, roll_id, class_id, section) VALUES ('$student_name', '$email', '$roll_id', '$class_id', '$section')";
    $conn->query($sql);
    echo "New student added successfully";
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel=" stylesheet" href="CSS/students.css">
    <title>Manage Students</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&
    display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
        integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>
<body>
    <div class="contact-container">
        <h1>Manage Students</h1>
        <form method="post" action="">
            <label>Add Student:</label>
            <input type="text" name="student_name" required>
            <br>
            <label>Email:</label>
            <input type="email" name="email" required>
            <br>
            <label>Roll ID:</label>
            <input type="text" name="roll_id" required>
            <br>
            <label>Section:</label>
            <input type="text" name="section" required>
            <br>
            <label>Select Class:</label>
            <select name="class_id">
                <?php
                $sql = "SELECT * FROM classes";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo "<option value='" . $row["id"] . "'>" . $row["name"] . "</option>";
                    }
                }
                ?>
            </select>
            
            <br>
            <button type="submit">Add Student</button>
        </form>
        <br>
        <a href="admin.php">Back to Admin Dashboard</a>
    </div>

    <?php
        // Display students
$sql = "SELECT * FROM students";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "<h2>Student: " . $row["name"] . "</h2>";
        echo "<p>Email: " . $row["email"] . "</p>";
        echo "<p>Roll ID: " . $row["roll_id"] . "</p>";
        echo "<p>Class: " . $row["class_id"] . "</p>";
        echo "<p>Section: " . $row["section"] . "</p>";
    }
}
    ?>
</body>
</html>