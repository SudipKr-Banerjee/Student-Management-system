<?php
session_start();
include 'db.php';

if (!isset($_SESSION['user_id']) || $_SESSION['role'] != 'admin') {
    header("Location: login.php");
    exit;
}

// Handle adding notices
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST['title'];
    $content = $_POST['content'];
    $sql = "INSERT INTO notices (title, content) VALUES ('$title', '$content')";
    $conn->query($sql);
    echo "New notice added successfully";
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/notices.css">
    <title>Manage Notices</title>

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
        <h1>Manage Notices</h1>
        <form method="post" action="">
            <label>Add Notice:</label>
            <input type="text" name="title" required>
            <br>
            <label>Content:</label>
            <textarea name="content" required></textarea>
            <br>
            <input type="submit" value="Add Notice">
        </form>
        <a href="admin.php">Back to Admin Dashboard</a>
    </div>
    <?php
// Display notices
$sql = "SELECT * FROM notices";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "<h2>" . $row["title"] . "</h2>";
        echo "<p>" . $row["content"] . "</p>";
    }
}
    ?>
</body>
</html>