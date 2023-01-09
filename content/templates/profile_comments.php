<?php
require_once '../scripts/config_script.php';

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

function convertToRelativePath($path)
{
  $path = str_replace('/opt/lampp/htdocs/content', '..', $path);
  return $path;
}

$username = $_SESSION['username'];
$sql = "SELECT * FROM users WHERE name = $username";

$result = mysqli_query($conn, $sql);
$resultCheck = mysqli_num_rows($result);
$commentObjects[] = [];

if ($resultCheck > 0) {
  while ($row = mysqli_fetch_assoc($result)) {
    $user_id = $row['id'];
    $sql = "SELECT * FROM reviews WHERE user_id = $user_id";
    $genreQueryResult = mysqli_query($conn, $sql);
    $genreResultCheck = mysqli_num_rows($genreQueryResult);

    if ($genreResultCheck > 0) {
      $row = mysqli_fetch_assoc($genreQueryResult);
      $title = $row['title'];
      $description = $row['review_content'];
      $date = $row['date'];
      $vg_id = $row['vg_id'];
      $sql = "SELECT * FROM videogames WHERE id = $vg_id";
      $genreQueryResult = mysqli_query($conn, $sql);
      $genreResultCheck = mysqli_num_rows($genreQueryResult);
      if ($genreResultCheck > 0) {
        $row = mysqli_fetch_assoc($genreQueryResult);
        $imagelink = convertToRelativePath($row['path']);
      }
      array_push($commentObjects, new CommentObj($title, $username, $description, $imagelink, $date));
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
