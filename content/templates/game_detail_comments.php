<?php
require_once '../scripts/config_script.php';
require_once '../scripts/helper_script.php';

class CommentObject
{
  public $username;
  public $description;
  public $date;
  public function __construct($username, $description, $date)
  {
    $this->username = $username;
    $this->description = $description;
    $this->date = $date;
  }
}

$game_id = $_GET['id'];

$sql = "SELECT * FROM reviews WHERE vg_id = $game_id";

$result = mysqli_query($conn, $sql);
$resultCheck = mysqli_num_rows($result);
$commentObjects[] = [];

if ($resultCheck > 0) {
  while ($row = mysqli_fetch_assoc($result)) {
    $date = $row['date'];
    $description = $row['review_content'];
    
    $uid = $row['user_id'];
    $sql = "SELECT * FROM `users` WHERE `user_id` = $uid";
    $userQueryResult = mysqli_query($conn, $sql);
    $userResultCheck = mysqli_num_rows($userQueryResult);

    if ($userResultCheck > 0) {
      $row = mysqli_fetch_assoc($userQueryResult);
      $username = $row['name'];

      array_push($commentObjects, new CommentObject($username, $description, $date));
    }
  }
}
#removal of the first, empty element
array_shift($commentObjects);

$commentArrays = [];
for ($i = 0; $i < count($commentObjects); $i++) {
  $commentArrays[$i] = (array) $commentObjects[$i];
}

echo $twig->render('game_detail_comments.html.twig', ['items' => $commentArrays, 'loggedInUsername' => $_SESSION['name'], 'gameId' => $game_id]);

?>