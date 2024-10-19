<?php
session_start();
include 'db.php';

if (!isset($_SESSION['user_id']) || $_SESSION['role'] != 'admin') {
    header("Location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>Admin Dashboard</title>

    <link rel="stylesheet" type="text/css" href="CSS/admin.css">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css"
        integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap-theme.min.css"
        integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js"
        integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa"
        crossorigin="anonymous"></script>

</head>
<body>
    
    <header class="header">
        <label class="logo"><a href="">ABS Academy of Polytechnic</a></label>
    </header>

    <aside> 
        <ul>
            
            <li><a href="classes.php">Manage Classes</a></li>
            <li> <a href="subjects.php">Manage Subjects</a></li>
            <li><a href="subject_combination.php">Manage Subject Combinations</a></li>
            <li> <a href="students.php">Manage Students</a></li>
            <li><a href="results.php">Declare/Edit Results</a></li>
            <li><a href="notices.php">Manage Notices</a></li>
            
            <li><a href="logout.php">Logout</a></li>  
        </ul>
    </aside>

    <div class="content">
        <h1>Admin Dashboard</h1>
    </div>

</body>
</html>