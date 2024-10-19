<?php
session_start();
include 'db.php';

if (!isset($_SESSION['user_id']) || $_SESSION['role'] != 'admin') {
    header("Location: login.php");
    exit;
}

// Handle declaring/editing results
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $student_id = $_POST['student_id'];
    $subject_id = $_POST['subject_id'];
    $marks = $_POST['marks'];
    $sql = "INSERT INTO results (student_id, subject_id, marks) VALUES ('$student_id', '$subject_id', '$marks')";
    $conn->query($sql);
    echo "Results declared successfully";
}

// Display students and subjects
$sql = "SELECT * FROM students";
$result_students = $conn->query($sql);

$sql = "SELECT * FROM subjects";
$result_subjects = $conn->query($sql);
?>

<!-- if ($result_students->num_rows > 0 && $result_subjects->num_rows > 0) { -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/results.css">
    <title>Declare/Edit Results</title>

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
        <h1>Declare/Edit Results</h1>
        <form method="post" action="">
            <label>Select Student:</label>
            <select name="student_id">
                <?php
                while($row = $result_students->fetch_assoc()) {
                    echo "<option value='" . $row["id"] . "'>" . $row["name"] . "</option>";
                }
                ?>
            </select>
            <br>
            <label>Select Subject:</label>
            <select name="subject_id">
                <?php
                while($row = $result_subjects->fetch_assoc()) {
                    echo "<option value='" . $row["id"] . "'>" . $row["name"] . "</option>";
                }
                ?>
            </select>
            <br>
            <label>Marks:</label>
            <input type="number" name="marks" required>
            <br>
            <input type="submit" value="Declare Results">
        </form>
        <br>
        <a href="admin.php">Back to Admin Dashboard</a>
    </div>
</body>
</html>
    
<!-- } -->



  