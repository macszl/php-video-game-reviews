<?php
require_once '../scripts/config_script.php';
require_once '../scripts/helper_script.php';

class GameObj
{
  public $title;
  public $description;
  public $path;
  public function __construct($title, $description, $path)
  {
    $this->title = $title;
    $this->description = $description;
    $this->path = $path;
  }
}

$game_id = $_GET['id'];
$sql = "SELECT * FROM videogames WHERE id = $game_id";

$result = mysqli_query($conn, $sql);
$resultCheck = mysqli_num_rows($result);
$gameObjects[] = [];

if ($resultCheck > 0) {
  while ($row = mysqli_fetch_assoc($result)) {
    $path = $row['path'];
    $title = $row['title'];
    $description = $row['description'];
    array_push($gameObjects, new GameObj($title, $description, convertToRelativePath($path)));
  }
}
#removal of the first, empty element
array_shift($gameObjects);

$gameArrays = [];
for ($i = 0; $i < count($gameObjects); $i++) {
  $gameArrays[$i] = (array) $gameObjects[$i];
}

echo $twig->render('game_detail_container.html.twig', ['item' => $gameArrays[0], 'gameID' => $_GET['id']]);
?>
