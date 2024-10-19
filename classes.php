<?php
session_start();
include 'db.php';

if (!isset($_SESSION['user_id']) || $_SESSION['role'] != 'admin') {
    header("Location: login.php");
    exit;
}

// Handle adding classes
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $class_name = $_POST['class_name'];
    $section = $_POST['section'];
    $sql = "INSERT INTO classes (name,section) VALUES ('$class_name', '$section')";
    $conn->query($sql);
    echo "New class added successfully";
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/classes.css">
    <title>Manage Classes</title>
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
        <h1>Manage Classes</h1>
        <form method="post" action="">
            <label>Add Class:</label>
            <input type="text" name="class_name" required>
            <br>
            <label>Add Section:</label>
            <input type="text" name="section" required>
            <br>
            <button type="submit">Add Class</button>
        </form>
        <br>
        <a href="admin.php">Back to Admin Dashboard</a>
    </div>

    <?php
    // Display classes
$sql = "SELECT * FROM classes";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "<h2>Class: " . $row["name"] . ",Section:" . $row["section"]. "</h2>";
    }
}
?>
    ?>
</body>
</html>