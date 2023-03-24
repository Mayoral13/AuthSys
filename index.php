<?php include "include/header.php"; ?>
<?php if(isset($_SESSION['username'])):?>
<h1 class="display-4"><?php echo("HELLO ".$_SESSION['username']);?></h1>
<?php else: header("location:login.php"); ?>
<?php endif;?>
<?php include "include/footer.php"; ?>
