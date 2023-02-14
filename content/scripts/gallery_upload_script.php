<?php
$title = $_POST['title'];
$description = $_POST['text'];
$genres = $_POST['genres'];
$image = $_FILES['image'];
$var_null = null;

if (empty($title) || empty($description) || empty($genres) || empty($image)) {
  echo 'Please fill in all the required fields';
  exit();
}
$genres = explode(',', $genres);
array_shift($genres);

$image_ext = strtolower(pathinfo($image['name'], PATHINFO_EXTENSION));
$allowed_ext = ['jpg', 'jpeg', 'png', 'gif'];
if (!in_array($image_ext, $allowed_ext)) {
  echo 'Invalid image file type. Only JPG, JPEG, PNG, GIF are allowed.';
  exit();
}

$image_path = '../assets/images/gallery/' . $image['name'];
if (move_uploaded_file($image['tmp_name'], $image_path)) {
  echo 'File uploaded successfully.';
} else {
  echo 'Error uploading file';
}

$mysqli = new mysqli('localhost', 'root', '', 'vgreviews');

$stmt = $mysqli->prepare('INSERT INTO `videogames` (id, title, description, path) VALUES (?, ?, ?, ?)');
$stmt->bind_param('isss', $var_null, $title, $description, $image_path);
$stmt->execute();

if ($stmt->affected_rows === -1) {
  echo 'Error: ' . $stmt->error;
} else {
  echo 'Data inserted successfully.';
}

$stmt = $mysqli->prepare('SELECT id FROM videogames WHERE title = ?');
$stmt->bind_param('s', $title);
$stmt->execute();

$result = $stmt->get_result();
$row = $result->fetch_assoc();
$vg_id = $row['id'];

foreach ($genres as $genre) {
  $stmt = $mysqli->prepare('SELECT id FROM genres WHERE title = ?');
  $stmt->bind_param('s', $genre);
  $stmt->execute();

  $result = $stmt->get_result();
  $row = $result->fetch_assoc();
  $genre_id = $row['id'];

  $stmt = $mysqli->prepare('INSERT INTO `genres_videogames` (id, genre_id, vg_id) VALUES (?, ?, ?)');
  $stmt->bind_param('iii', $var_null, $genre_id, $vg_id);
  $stmt->execute();
}

$stmt->close();
$mysqli->close();
?>
