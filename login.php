<?php
session_start();
if(isset($_SESSION['username'])) {
    header("location:front_page.php");
}
include("connection.php");
$username = "";
$password = "";
$err = "";
if(isset($_POST['login'])){
    $username = $_POST['username'];
    $password = $_POST['password'];
    if($username == '' or $password == "") {
        $err .= "<li>Please fill all the fields</li>";
    }
    if(empty($err)) {
        $sql1 = "SELECT * FROM `login_user` WHERE username = '$username'";
        $q1 = mysqli_query($connection, $sql1);
        $r1 = mysqli_fetch_array($q1);
        if ($r1['password'] != md5($password)) {
            $err .= "<li>Account Not Found</li>";
        }
    }
    if(empty($err)){
        $login_id = $r1['login_id'];
        $sql1 = "SELECT * FROM user_access WHERE login_id = '$login_id'";
        $q1 = mysqli_query($connection, $sql1);
        while ($r1 = mysqli_fetch_array($q1)){
            $access[] = $r1['access_id'];
        }
        if (empty($access)){
            $err .= "<li>You dont have an access to this page</li>";
        }
    }
    if (empty($err)) {
        $_SESSION['username'] = $username;
        $_SESSION['user_access'] = $access;
        header("location:front_page.php");
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div id="app">
        <h1>Login Page</h1>
        <?php
        if ($err) {
            echo "<ul>$err</ul>";
        }
        ?>
        <form action="" method="post">
            <input type="text" name="username" value="<?php echo $username ?>" class="input" placeholder="Username"><br><br>
            <input type="password" name="password" class="input" placeholder="Password"><br><br>
            <input type="submit" name="login" value="Login to System">
        </form>
    </div>
</body>
</html>