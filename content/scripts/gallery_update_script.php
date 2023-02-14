<?php
error_reporting(E_ALL);
$title = $_POST['title'];
$description = $_POST['text'];
$genres = $_POST['genres'];
$image = $_FILES['image'];
$var_null = null;

//split an array on commas
$genres = explode(',', $genres);
array_shift($genres);

if (empty($title) || empty($description) || empty($genres) || empty($image)) {
  echo 'Please fill in all the required fields';
  exit();
}

$image_ext = strtolower(pathinfo($image['name'], PATHINFO_EXTENSION));
$allowed_ext = ['jpg', 'jpeg', 'png', 'gif'];
if (!in_array($image_ext, $allowed_ext)) {
  echo 'Invalid image file type. Only JPG, JPEG, PNG, GIF are allowed.';
  exit();
}
$debug_err = '';
$image_path = '../assets/images/gallery/' . $image['name'];
if (move_uploaded_file($image['tmp_name'], $image_path)) {
  echo 'File uploaded successfully.';
} else {
  $debug_err = 'Not uploaded because of error #' . $_FILES['image']['error'];
}

$mysqli = new mysqli('localhost', 'root', '', 'vgreviews');

$vg_id = intval($_GET['id']);

$stmt = $mysqli->prepare('UPDATE videogames SET title = ?, description = ?, path = ? WHERE id = ?');
$stmt->bind_param('sssi', $title, $description, $image_path, $vg_id);
$stmt->execute();

//delete genres from genres_videogames table that are not in the form
//add genres to genres_videogames table that are in the form but not in the database
$stmt = $mysqli->prepare('SELECT genre_id FROM `genres_videogames` WHERE vg_id = ?');
$stmt->bind_param('i', $vg_id);
$stmt->execute();

//creating an array of genre ids that are in the database
$result = $stmt->get_result();
$genres_in_db = [];
while ($row = $result->fetch_assoc()) {
  array_push($genres_in_db, $row['genre_id']);
}

//iterating over the list of genres in the form
foreach ($genres as $genre) {
  //checking if the genre is in the database
  $stmt = $mysqli->prepare('SELECT id FROM genres WHERE title = ?');
  $stmt->bind_param('s', $genre);
  $stmt->execute();

  $result = $stmt->get_result();
  $row = $result->fetch_assoc();
  $genre_id = $row['id'];
  //if the genre is not in the database, add it
  if (!in_array($genre_id, $genres_in_db)) {
    $stmt = $mysqli->prepare('INSERT INTO `genres_videogames` (`id`, `genre_id`, `vg_id`) VALUES (?, ?, ?)');
    $stmt->bind_param('iii', $var_null, $genre_id, $vg_id);
    $stmt->execute();
  }
}
//iterating over the list of genres in the database
foreach ($genres_in_db as $genre_id) {
  //checking if the genre is in the form
  if (!in_array($genre_id, $genres)) {
    $stmt = $mysqli->prepare('DELETE FROM `genres_videogames` WHERE genre_id = ? AND vg_id = ?');
    $stmt->bind_param('ii', $genre_id, $vg_id);
    $stmt->execute();
  }
}

if ($stmt->affected_rows === -1) {
  echo 'Error: ' . $stmt->error;
} else {
  echo 'Data inserted successfully.';
}

$stmt->close();
$mysqli->close();

?>
