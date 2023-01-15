<?php
include("connection.php");
include("Users.php");

$user = new Users();

if (isset($_POST['login'])) {
  $user->set_login_data($_POST['nip'], $_POST['password']);

  $id = $user->get_employee_id();
  $password = $user->get_password();

  $sql = "SELECT * FROM users WHERE employee_id= $id AND password = $password";
  $result = $db->query($sql);

  if ($result->num_rows > 0) {
    echo "WOWW COCOK BROOO!!! USER ADA";
  } else {
    echo "DATA TIDAK VALID";
  }
}

?>