<?php
require_once '../scripts/config_script.php';
require_once '../scripts/helper_script.php';
class FavoriteObj
{
  public $title;
  public $username;
  public $imagelink;
  public $date;
  public function __construct($title, $username, $imagelink, $date)
  {
    $this->title = $title;
    $this->username = $username;
    $this->imagelink = $imagelink;
    $this->date = $date;
  }
}

$username = $_SESSION['username'];
$sql = "SELECT * FROM users WHERE name = $username";

$result = mysqli_query($conn, $sql);
$resultCheck = mysqli_num_rows($result);
$favoriteObjects[] = [];

if ($resultCheck > 0) {
  while ($row = mysqli_fetch_assoc($result)) {
    $user_id = $row['id'];
    $sql = "SELECT * FROM reviews WHERE user_id = $user_id";
    $genreQueryResult = mysqli_query($conn, $sql);
    $genreResultCheck = mysqli_num_rows($genreQueryResult);

    if ($genreResultCheck > 0) {
      $row = mysqli_fetch_assoc($genreQueryResult);
      $title = $row['title'];
      $date = $row['date'];
      $vg_id = $row['vg_id'];
      $sql = "SELECT * FROM videogames WHERE id = $vg_id";
      $genreQueryResult = mysqli_query($conn, $sql);
      $genreResultCheck = mysqli_num_rows($genreQueryResult);
      if ($genreResultCheck > 0) {
        $row = mysqli_fetch_assoc($genreQueryResult);
        $imagelink = convertToRelativePath($row['path']);
      }
      array_push($favoriteObjects, new FavoriteObj($title, $username, $imagelink, $date));
    }
  }
}
#removal of the first, empty element
array_shift($favoriteObjects);

$favoriteArrays = [];
for ($i = 0; $i < count($favoriteObjects); $i++) {
  $favoriteArrays[$i] = (array) $favoriteObjects[$i];
}

echo $twig->render('profile_comments.html.twig', ['items' => $favoriteArrays]);

?>
