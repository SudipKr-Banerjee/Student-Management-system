<?php
session_start();
include 'db.php';

if (!isset($_SESSION['user_id']) || $_SESSION['role'] != 'admin') {
    header("Location: login.php");
    exit;
}

// Handle adding subject combinations
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $class_id = $_POST['class_id'];
    $subject_id = $_POST['subject_id'];
    $section = $_POST['section'];
    $sql = "INSERT INTO subject_combinations (class_id, subject_id, section) VALUES ('$class_id', '$subject_id', '$section')";
    $conn->query($sql);
    echo "New subject combination added successfully";
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/subject_combinations.css">
    <title>Manage Subject Combinations</title>

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
        <h1>Manage Subject Combinations</h1>
        <form method="post" action="">
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
            <label>Select Section:</label>
            <select name="section">
                <?php
                $sql = "SELECT * FROM classes";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo "<option value='" . $row["id"] . "'>" . $row["section"] . "</option>";
                    }
                }
                ?>
            </select>
            <br>
            <label>Select Subject:</label>
            <select name="subject_id">
                <?php
                $sql = "SELECT * FROM subjects";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo "<option value='" . $row["id"] . "'>" . $row["name"] . "</option>";
                    }
                }
                ?>
            </select>
            <br>
            <button type="submit">Add Subject Combination</button>
        </form>
        <br>
        <a href="admin.php">Back to Admin Dashboard</a>
    </div>
    <?php
        // Display subject combinations
        $sql = "SELECT * FROM subject_combinations";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<h2>Class: " . $row["class_id"] . ", Subject: " . $row["subject_id"] . ", Section:" . $row["section"].  "</h2>";
            }
        }
    ?>
</body>
</html>