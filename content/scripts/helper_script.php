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

function getCurrentDateYMD()
{
  $date = new DateTime();
  $date = $date->format('Y-m-d');
  return $date;
}

function getGameDetailsFromDbByName($conn, $gameName)
{
  $sql = 'SELECT * FROM `games` WHERE `name` = ?';
  $stmt = mysqli_stmt_init($conn);

  if (!mysqli_stmt_prepare($stmt, $sql)) {
    header('Location: ../main/index.php?error=stmtfailed');
    exit();
  }
  mysqli_stmt_bind_param($stmt, 's', $gameName);
  mysqli_stmt_execute($stmt);
  $resultData = mysqli_stmt_get_result($stmt);
  $row = mysqli_fetch_assoc($resultData);
  mysqli_stmt_close($stmt);
  if ($row) {
    return $row;
  } else {
    return false;
  }
}

function getGameDetailsFromDbByGenre($conn, $gameGenre)
{
  $sql = 'SELECT * FROM `games` WHERE `genre` = ?';
  $stmt = mysqli_stmt_init($conn);

  if (!mysqli_stmt_prepare($stmt, $sql)) {
    header('Location: ../main/index.php?error=stmtfailed');
    exit();
  }
  mysqli_stmt_bind_param($stmt, 's', $gameGenre);
  mysqli_stmt_execute($stmt);
  $resultData = mysqli_stmt_get_result($stmt);
  $row = mysqli_fetch_assoc($resultData);
  mysqli_stmt_close($stmt);
  if ($row) {
    return $row;
  }
}

function uploadReviewDetailsToDb($conn, $vg_id, $user_id, $review_content, $date)
{
  $sql = 'INSERT INTO `reviews` (`id`, `vg_id`, `user_id`, `review_content`, `date`) VALUES (?, ?, ?, ?, ?)';
  $stmt = mysqli_stmt_init($conn);

  if (!mysqli_stmt_prepare($stmt, $sql)) {
    header('Location: ../main/index.php?error=itsbroken');
    exit();
  }
  $id = null;

  mysqli_stmt_bind_param($stmt, 'iiiss', $id, $vg_id, $user_id, $review_content, $date);
  mysqli_stmt_execute($stmt);
  mysqli_stmt_close($stmt);
}

function uploadFavoriteToDb($conn, $vg_id, $user_id, $date)
{
  $sql = 'INSERT INTO `favorites` (`id`, `vg_id`, `user_id`, `date`) VALUES (?, ?, ?, ?)';
  $stmt = mysqli_stmt_init($conn);

  if (!mysqli_stmt_prepare($stmt, $sql)) {
    header('Location: ../main/index.php?error=itsbroken');
    exit();
  }
  $id = null;

  mysqli_stmt_bind_param($stmt, 'iiis', $id, $vg_id, $user_id, $date);
  mysqli_stmt_execute($stmt);
  mysqli_stmt_close($stmt);
}

function getCommentsFromDb($conn)
{
  $sql = 'SELECT * FROM `comments`';
  $stmt = mysqli_stmt_init($conn);

  if (!mysqli_stmt_prepare($stmt, $sql)) {
    header('Location: ../main/index.php?error=stmtfailed');
    exit();
  }
  mysqli_stmt_execute($stmt);
  $resultData = mysqli_stmt_get_result($stmt);
  $comments = mysqli_fetch_all($resultData, MYSQLI_ASSOC);
  mysqli_stmt_close($stmt);
  return $comments;
}

function getGameDetailsFromDb($conn, $game_id)
{
  $sql = 'SELECT * FROM videogames WHERE id = ?';
  $stmt = mysqli_stmt_init($conn);

  if (!mysqli_stmt_prepare($stmt, $sql)) {
    header('Location: ../main/index.php?error=stmtfailed');
    exit();
  }
  mysqli_stmt_bind_param($stmt, 's', $game_id);
  mysqli_stmt_execute($stmt);
  $resultData = mysqli_stmt_get_result($stmt);
  $gameDetails = mysqli_fetch_all($resultData, MYSQLI_ASSOC);
  mysqli_stmt_close($stmt);
  return $gameDetails;
}

function getUserIdByName($conn, $name)
{
  $sql = 'SELECT `user_id` FROM `users` WHERE `name` = ?';
  $stmt = mysqli_stmt_init($conn);

  if (!mysqli_stmt_prepare($stmt, $sql)) {
    header('Location: ../main/index.php?error=stmtfailed');
    exit();
  }
  mysqli_stmt_bind_param($stmt, 's', $name);
  mysqli_stmt_execute($stmt);
  $resultData = mysqli_stmt_get_result($stmt);
  $row = mysqli_fetch_all($resultData, MYSQLI_ASSOC);
  mysqli_stmt_close($stmt);
  return $row[0]['user_id'];
}

function getCommentsFromDbByGameId($conn, $game_id)
{
  $sql = 'SELECT * FROM `comments` WHERE `vg_id` = ?';
  $stmt = mysqli_stmt_init($conn);

  if (!mysqli_stmt_prepare($stmt, $sql)) {
    header('Location: ../main/index.php?error=stmtfailed');
    exit();
  }
  mysqli_stmt_bind_param($stmt, 's', $game_id);
  mysqli_stmt_execute($stmt);
  $resultData = mysqli_stmt_get_result($stmt);
  $comments = mysqli_fetch_all($resultData, MYSQLI_ASSOC);
  mysqli_stmt_close($stmt);
  return $comments;
}

function uploadCommentToDb($conn, $comment, $game_id, $user_id)
{
  $sql = 'INSERT INTO `comments` (`id`, `comment`, `vg_id`, `user_id`) VALUES (?, ?, ?, ?)';
  $stmt = mysqli_stmt_init($conn);

  if (!mysqli_stmt_prepare($stmt, $sql)) {
    header('Location: ../main/index.php?error=itsbroken');
    exit();
  }
  $id = null;
  mysqli_stmt_bind_param($stmt, 'issi', $id, $comment, $game_id, $user_id);
  mysqli_stmt_execute($stmt);
  mysqli_stmt_close($stmt);
}

function getReviewsFromDbByGameId($conn, $game_id)
{
  $sql = 'SELECT * FROM `reviews` WHERE `vg_id` = ?';
  $stmt = mysqli_stmt_init($conn);

  if (!mysqli_stmt_prepare($stmt, $sql)) {
    header('Location: ../main/index.php?error=stmtfailed');
    exit();
  }
  mysqli_stmt_bind_param($stmt, 's', $game_id);
}

class VideoGameObj
{
  public $id;
  public $title;
  public $description;
  public $path;
  public $genres;
  public function __construct($id, $title, $description, $path, $genres)
  {
    $this->id = $id;
    $this->title = $title;
    $this->description = $description;
    $this->path = $path;
    $this->genres = $genres;
  }
}

function getLatestVideogamesObjects($conn, $limit)
{
  $sql = 'SELECT * FROM videogames';
  $result = mysqli_query($conn, $sql);
  $resultCheck = mysqli_num_rows($result);
  $videogames[] = [];
  $i = 0;

  if ($resultCheck > 0) {
    while ($i < $limit) {
      $row = mysqli_fetch_assoc($result);
      $id = $row['id'];
      $title = $row['title'];
      $description = $row['description'];
      $path = $row['path'];

      $genresOfVideogame = [];
      $sql = "SELECT * FROM genres_videogames WHERE vg_id = $id";
      $junctionTableQueryResult = mysqli_query($conn, $sql);
      $junctionTableResultCheck = mysqli_num_rows($junctionTableQueryResult);

      if ($junctionTableResultCheck > 0) {
        while ($row1 = mysqli_fetch_assoc($junctionTableQueryResult)) {
          $gid = $row1['genre_id'];

          $sql = "SELECT * FROM genres WHERE id = $gid";
          $genreQueryResult = mysqli_query($conn, $sql);
          $genreResultCheck = mysqli_num_rows($genreQueryResult);

          if ($genreResultCheck > 0) {
            $row = mysqli_fetch_assoc($genreQueryResult);
            array_push($genresOfVideogame, $row['title']);
          }
        }
      }
      array_push($videogames, new VideoGameObj($id, $title, $description, convertToRelativePath($path), $genresOfVideogame));
      $i++;
    }
    array_shift($videogames); 
  }

  return $videogames;
}