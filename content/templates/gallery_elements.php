<?php
require_once '../scripts/config_script.php';

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

function convertToRelativePath($path)
{
  $path = str_replace('/opt/lampp/htdocs/content', '..', $path);
  return $path;
}

$sql = 'SELECT * FROM videogames';
$result = mysqli_query($conn, $sql);
$resultCheck = mysqli_num_rows($result);
$videogames[] = [];

if ($resultCheck > 0) {
  while ($row = mysqli_fetch_assoc($result)) {
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
  }
}
#removal of the first, empty element
array_shift($videogames);

$vidcons = [];
for ($i = 0; $i < count($videogames); $i++) {
  $vidcons[$i] = (array) $videogames[$i];
}

echo $twig->render('gallery_elements_copy.html.twig', ['items' => $vidcons]);
?>
