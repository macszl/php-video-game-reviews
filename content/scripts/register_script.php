<?php

//user accessed the page the proper way
if (isset($_POST['submit'])) {
  $name = $_POST['txt'];
  $password = $_POST['pswd'];
  $email = $_POST['email'];

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

  if (validateEmail($email) == false) {
    header('Location: ../main/index.php?error=wrongemail');
    exit();
  }

  if (checkIfUserExists($conn, $name, $email) == true) {
    header('Location: ../main/index.php?error=userexists');
    exit();
  }

  insertUser($conn, $name, $email, $password);
  header('Location: ../login/register_accepted.php');
  exit();
} else {
  header('Location: ../main/index.php');
  exit();
}
