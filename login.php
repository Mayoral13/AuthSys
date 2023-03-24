<?php include "include/header.php"; ?>
<?php 
if((!isset($_SESSION['username']))){

if(isset($_POST['submit'])){
    $password = $_POST['password'];
    $email = $_POST['email'];

    if($email == "" or $password == ""){
        echo("FILL IN DETAILS COMPLETELY");
    }else{
        $password = $_POST['password'];
        $email = $_POST['email'];
        $query = $connection->query("SELECT * FROM portfolio.users WHERE email = '$email'");
        $query->execute();
        $data = $query->fetch(PDO::FETCH_ASSOC);
        if($query->rowCount() > 0){
            if($email == $data['email']){
             $verify = password_verify($password,$data['mypassword']);
             if($verify){
             $_SESSION['username'] = $data['username'];
             echo("LOGGED IN");
             header("location:index.php");
             }else{
                echo("INCORRECT PASSWORD");
             }
            }
        }else{
            echo("RECORD DOES NOT EXIST");
        }
       
    }
}
}else{
    header("location:index.php");
}

?>

<main class = "form-signin w-50 m-auto">
<form method = "POST" action = "login.php">
<h1 class = " mt-5 fw-normal text-center"> LOGIN</h1>

  <div class="mb-3">
    <input type="email" placeholder = "Email" name = "email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
  </div>
  <div class="mb-3">
    <input type="password" placeholder = "Password" name= "password" class="form-control" id="exampleInputPassword1">
  </div>
  <button type="submit" name = "submit" class="btn btn-primary">LOGIN</button>
</form>
</main>
<?php include "include/footer.php"; ?>
