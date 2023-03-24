<?php include "include/header.php"; ?>
<?php 
if(isset($_POST['submit'])){
    $username = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email'];

    if($username == "" or $email == "" or $password == ""){
        echo("FILL IN DETAILS COMPLETELY");
    }else{
        $insert = $connection->prepare(("INSERT INTO portfolio.users(username,email,mypassword)
        VALUES(:username,:email,:mypassword)"));

        $query1 = $connection->query("SELECT * FROM portfolio.users WHERE email = '$email'");
        $query1->execute();
        $data1 = $query1->fetch(PDO::FETCH_ASSOC);
        $query2 = $connection->query("SELECT * FROM portfolio.users WHERE username = '$username'");
        $query2->execute();
        $data2 = $query2->fetch(PDO::FETCH_ASSOC);
        if($query1->rowCount() > 0 and $data1['email'] == $email){
          echo("EMAIL ALREADY IN USE");
        }else if($query2->rowCount() > 0 and $data2['username'] == $username){
          echo("USERNAME ALREADY IN USE");
        }else{
          $insert->execute([
            ':email' => $email,
            ':username' => $username,
            ':mypassword' => password_hash($password,PASSWORD_DEFAULT)
        ]);
        echo("REGISTRATION SUCCESSFUL");
        }

        
    } 
    
}


?>


<main class = "form-signin w-50 m-auto">
<form method = "POST" action = "register.php">
<h1 class = " mt-5 fw-normal text-center"> REGISTRATION</h1>

  <div class="mb-3">
    <input type="email" placeholder = "Email" name = "email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
  </div>
  <div class="mb-3">
    <input type="text" placeholder = "Username" name= "username" class="form-control" id="exampleInputPassword1">
  </div>
  <div class="mb-3">
    <input type="password" placeholder = "Password" name= "password" class="form-control" id="exampleInputPassword1">
  </div>
  <button type="submit" name = "submit" class="btn btn-primary">REGISTER</button>
</form>
</main>
<?php include "include/footer.php"; ?>
