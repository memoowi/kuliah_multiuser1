<?php
session_start();
include("connection.php");
if(!isset($_SESSION['username'])) {
    header("location:login.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div id="app">
        <nav>
            <ul>
                <li><a href="front_page.php">Home</a></li>
                <?php if(in_array("teacher", $_SESSION['user_access'])){ ?>
                <li><a href="teacher_page.php">Teacher</a></li>
                <?php } ?>
                <?php if(in_array("student", $_SESSION['user_access'])){ ?>
                <li><a href="student_page.php">Student</a></li>
                <?php } ?>
                <li><a href="logout.php">Logout >></a></li>
            </ul>
        </nav>