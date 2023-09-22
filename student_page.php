<?php
include("header.php");
if(!in_array("student", $_SESSION['user_access'])){
    echo "You dont have an access to this page";
    include("footer.php");
    exit();
}
?>
<h1>Student Page</h1>
<p>Welcome to the Student Page</p>
<?php
include("footer.php")
?>