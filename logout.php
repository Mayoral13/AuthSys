<?php include "include/header.php"; ?>
<?php 
session_unset();
session_destroy();
header("location:login.php");?>
<?php include "include/footer.php"; ?>
