<?php
require_once '../scripts/config_script.php';
require_once '../scripts/helper_script.php';

class CommentObj
{
  public $title;
  public $username;
  public $description;
  public $imagelink;
  public $date;
  public function __construct($title, $username, $description, $imagelink, $date)
  {
    $this->title = $title;
    $this->username = $username;
    $this->description = $description;
    $this->imagelink = $imagelink;
    $this->date = $date;
  }
}

$username = "\"" . $_SESSION['name'] . "\"";
$sql = "SELECT * FROM `users` WHERE `name` =  $username";

$result = mysqli_query($conn, $sql);
$resultCheck = mysqli_num_rows($result);
$commentObjects[] = [];

if ($resultCheck > 0) {
  while ($row = mysqli_fetch_assoc($result)) {
    $user_id = $row['user_id'];
    $sql = "SELECT * FROM reviews WHERE user_id = $user_id";
    $reviewQueryResult = mysqli_query($conn, $sql);
    $reviewResultCheck = mysqli_num_rows($reviewQueryResult);

    if ($reviewResultCheck > 0) {
      while ($row = mysqli_fetch_assoc($reviewQueryResult)) {
        $title = '';
        $description = $row['review_content'];
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
        array_push($commentObjects, new CommentObj($title, $username, $description, $imagelink, $date));
      }
    }
  }
}
#removal of the first, empty element
array_shift($commentObjects);

$commentArrays = [];
for ($i = 0; $i < count($commentObjects); $i++) {
  $commentArrays[$i] = (array) $commentObjects[$i];
}

echo $twig->render('profile_comments.html.twig', ['items' => $commentArrays]);

?>
