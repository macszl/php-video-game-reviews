<?php
if (isset($_POST['submit'])) {
  $name = $_POST['txt'];
  $password = $_POST['pswd'];

  require_once 'config_script.php';
  require_once 'helper_script.php';

  if (validateAlnum($name) == false) {
    header('Location: ../main/index.php?error=wrongname');
    exit();
  }

  if (validateAlnum($password) == false) {
    header('Location: ../main/index.php?error=wrongpass');
    exit();
  }

  if (userExistsAndPasswordChecksOut($conn, $name, $password)) {
    session_start();
    $_SESSION['name'] = $name;
    $_SESSION['password'] = $password;
    header('Location: ../login/login_accepted.php');
    exit();
  } else {
    header('Location: ../main/index.php?error=wronglogin');
    exit();
  }
} else {
  header('Location: ../main/index.php');
  exit();
}
