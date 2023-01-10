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

$username = "\"" . $_SESSION['name'] . "\"";
$sql = "SELECT * FROM users WHERE name = $username";

$result = mysqli_query($conn, $sql);
$resultCheck = mysqli_num_rows($result);
$favoriteObjects[] = [];

if ($resultCheck > 0) {
  while ($row = mysqli_fetch_assoc($result)) {
    $user_id = $row['user_id'];
    $sql = "SELECT * FROM favorites WHERE user_id = $user_id";
    $favQueryResult = mysqli_query($conn, $sql);
    $favResultCheck = mysqli_num_rows($favQueryResult);

    if ($favResultCheck > 0) {
      while ($row = mysqli_fetch_assoc($favQueryResult)) {
        $title = '';
        $date = $row['date'];
        $vg_id = $row['vg_id'];
        $sql = "SELECT * FROM videogames WHERE id = $vg_id";
        $vidyaQueryResult = mysqli_query($conn, $sql);
        $vidyaResultCheck = mysqli_num_rows($vidyaQueryResult);
        if ($vidyaResultCheck > 0) {
          $row = mysqli_fetch_assoc($vidyaQueryResult);
          $title = $row['title'];
          $imagelink = convertToRelativePath($row['path']);
        }
        array_push($favoriteObjects, new FavoriteObj($title, $username, $imagelink, $date));
      }
    }
  }
}
#removal of the first, empty element
array_shift($favoriteObjects);

$favoriteArrays = [];
for ($i = 0; $i < count($favoriteObjects); $i++) {
  $favoriteArrays[$i] = (array) $favoriteObjects[$i];
}

echo $twig->render('profile_favorites.html.twig', ['items' => $favoriteArrays]);

?>
