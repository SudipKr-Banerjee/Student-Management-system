<?php
session_start();
include 'db.php';

if (!isset($_SESSION['user_id']) || $_SESSION['role'] != 'admin') {
    header("Location: login.php");
    exit;
}

// Handle adding subjects
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $subject_name = $_POST['subject_name'];
    $sql = "INSERT INTO subjects (name) VALUES ('$subject_name')";
    $conn->query($sql);
    echo "New subject added successfully";
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/subjects.css">
    <title>Manage Subjects</title>

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
        <h1>Manage Subjects</h1>
        <form method="post" action="">
            <label>Add Subject:</label>
            <input type="text" name="subject_name" required>
            <br>
            <button type="submit">Add Subject</button>
        </form>
        <br>
        <a href="admin.php">Back to Admin Dashboard</a>
    </div>
    <?php
        // Display subjects
$sql = "SELECT * FROM subjects";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "<h2>Subject: " . $row["name"] . "</h2>";
    }
}
    ?>
</body>
</html>