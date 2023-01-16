<?php 
require_once '../scripts/config_script.php';
require_once '../scripts/helper_script.php';

class GenreObj
{
    public $title;
    public $description;
    public function __construct($title, $description)
    {
        $this->title = $title;
        $this->description = $description;
    }
}

$game_id = $_GET['id'];
$sql = "SELECT * FROM genres_videogames WHERE vg_id = $game_id";

$result = mysqli_query($conn, $sql);
$resultCheck = mysqli_num_rows($result);
$genreObjects[] = [];

if ($resultCheck > 0) {
  while ($row = mysqli_fetch_assoc($result)) {
    $genre_id = $row['genre_id'];
    $sql = "SELECT * FROM genres WHERE id = $genre_id";
    $genreQueryResult = mysqli_query($conn, $sql);
    $genreResultCheck = mysqli_num_rows($genreQueryResult);
    if($genreResultCheck > 0) {
      $row = mysqli_fetch_assoc($genreQueryResult);
      $title = $row['title'];
      $description = $row['description'];
      array_push($genreObjects, new GenreObj($title, $description));
    }
  }
}
#removal of the first, empty element
array_shift($genreObjects);

$genreArrays = [];
for ($i = 0; $i < count($genreObjects); $i++) {
  $genreArrays[$i] = (array) $genreObjects[$i];
}

echo $twig->render('game_detail_genre_lister.html.twig', ['items' => $genreArrays]);

?>