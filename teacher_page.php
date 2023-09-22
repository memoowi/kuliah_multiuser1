<?php
include("header.php");
if(!in_array("teacher", $_SESSION['user_access'])){
    echo "You dont have an access to this page";
    include("footer.php");
    exit();
}
?>
<h1>Teacher Page</h1>
<p>Welcome to the Teacher Page</p>
<?php
include("footer.php")
?>