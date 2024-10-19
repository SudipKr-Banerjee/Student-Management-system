<?php
session_start();
include 'db.php';

if (!isset($_SESSION['user_id']) || $_SESSION['role'] != 'student') {
    header("Location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/search_result.css">
    <title>Search Results</title>

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
        <h1>Search Results</h1>
        <form method="post" action="">
            <label>Enter Roll ID:</label>
            <input type="text" name="roll_id" required>
            <br>
            <input type="submit" value="Search Results">
        </form>
       
        <br>
        <a href="student.php">Back to Student Dashboard</a>
    </div>
    <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $roll_id = $_POST['roll_id'];
            $sql = "SELECT * FROM results WHERE student_id = (SELECT id FROM students WHERE roll_id = '$roll_id')";
            $result = $conn->query($sql );
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<h2>Subject: " . $row["subject_id"] . "</h2>";
                    echo "<p>Marks: " . $row["marks"] . "</p>";
                }
            } else {
                echo "No results found";
            }
        }
        ?>
</body>
</html>