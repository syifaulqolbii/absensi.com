<?php 
session_start();

if(isset($_SESSION['status'])){
  header("Location: dashboard/index.php");
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style.css"/>
  <title>LOGIN PAGE</title>
</head>
<body>
  <div class="container">
    <section class="wrapper">
      <h3 class="title">LOGIN</h3>
      <?php 
      
      if (isset($_GET['message'])) {
        $message = $_GET['message'];
        echo "<div class='notif-login'>$message</div>";
      }
      ?>

      <div>
        <form action="login.php" method="POST" class="form-login">
          <label>Masukan nomor induk</label>
          <input placeholder="masukkan nip" name="nip" type="number" class="input-login" required/>
          <label>Masukan password</label>
          <input placeholder="***********" name="password" type="password" class="input-login" required/>
          <button type="submit" class="button-login" name="login">Login</button>
        </form>
      </div>
    </section>
  </div>
</body>
</html>