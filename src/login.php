<?php
include("connection.php");
include("Users.php");
session_start();


$user = new Users();

if (isset($_POST['login'])) {
  if (strlen($_POST['nip']) < 2 || strlen($_POST['password']) < 2) {
    header("Location: index.php?message=inputan data tidak valid");
  } else {
    $user->set_login_data($_POST['nip'], $_POST['password']);
    
    $id = $user->get_employee_id();
    $password = $user->get_password();
    
    $sql = "SELECT * FROM users WHERE employee_id= $id AND password = '$password'";
    $result = $db->query($sql);
    
    if ($result->num_rows > 0) {
      // data yang akan dikirim ke dashboard
      while($row = $result->fetch_assoc()){
        $_SESSION['status'] = "login";
        $_SESSION['employee_id'] = $row['employee_id'];
        $_SESSION['fullname'] = $row['fullname'];
        $_SESSION['role'] = $row['role'];
      }

      

      header("Location: dashboard/index.php");
      
    } else {
      header("Location: index.php?message=nip atau password salah");
    }
    
  }
}
