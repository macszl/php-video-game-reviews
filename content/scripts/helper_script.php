<?php

function validateParam(&$param)
{
  $param = trim($param);
  $param = stripslashes($param);
  $param = htmlspecialchars($param);
  if (empty($param)) {
    return false;
  }

  return true;
}

function validateEmail(&$email)
{
  if (!validateParam($email)) {
    return false;
  }

  if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    return false;
  }

  return true;
}

function validateAlnum(&$alnum)
{
  if (validateParam($alnum) == false) {
    return false;
  }

  if (preg_match("/^[a-zA-Z0-9]*$/", $alnum)) {
    return true;
  } else {
    return false;
  }
}
function validateRegister(&$name, &$email, &$password)
{
  if (!validateAlnum($name)) {
    return false;
  }

  if (!validateAlnum($password)) {
    return false;
  }

  if (!validateEmail($email)) {
    return false;
  }

  return true;
}

function checkIfUserExists($conn, $user, $email)
{
  $sql = 'SELECT * FROM `users` WHERE `email` = ? OR `name` = ?';
  $stmt = mysqli_stmt_init($conn);

  if (!mysqli_stmt_prepare($stmt, $sql)) {
    header('Location: ../main/index.php?error=stmtfailed');
    exit();
  }
  mysqli_stmt_bind_param($stmt, 'ss', $email, $user);
  mysqli_stmt_execute($stmt);
  $resultData = mysqli_stmt_get_result($stmt);
  $row = mysqli_fetch_assoc($resultData);
  mysqli_stmt_close($stmt);
  if ($row) {
    return true;
  } else {
    return false;
  }
}

function insertUser($conn, $user, $email, $password)
{
  $sql = 'INSERT INTO `users` (name, email, password) VALUES (?, ?, ?)';
  $stmt = mysqli_stmt_init($conn);

  if (!mysqli_stmt_prepare($stmt, $sql)) {
    header('Location: ../main/index.php?error=stmtfailed');
    exit();
  }
  $hashedPassword = password_hash($password, PASSWORD_BCRYPT);
  mysqli_stmt_bind_param($stmt, 'sss', $user, $email, $hashedPassword);
  mysqli_stmt_execute($stmt);
  mysqli_stmt_close($stmt);
}

function userExistsAndPasswordChecksOut($conn, $user, $password)
{
  $sql = 'SELECT * FROM `users` WHERE `name` = ? OR `password` = ?';
  $stmt = mysqli_stmt_init($conn);

  if (!mysqli_stmt_prepare($stmt, $sql)) {
    header('Location: ../main/index.php?error=stmtfailed');
    exit();
  }
  $hashedPassword = password_hash($password, PASSWORD_BCRYPT);
  mysqli_stmt_bind_param($stmt, 'ss', $user, $hashedPassword);
  mysqli_stmt_execute($stmt);
  $resultData = mysqli_stmt_get_result($stmt);
  $row = mysqli_fetch_assoc($resultData);
  mysqli_stmt_close($stmt);
  if ($row) {
    return true;
  } else {
    return false;
  }
}

function convertToRelativePath($path)
{
  $path = str_replace('/opt/lampp/htdocs/content', '..', $path);
  return $path;
}