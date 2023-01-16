<?php
require_once '../scripts/config_script.php';
require_once '../scripts/helper_script.php';

$videogames = [];
$vidcons = getLatestVideogamesObjects($conn, 4);
for ($i = 0; $i < count($videogames); $i++) {
  $vidcons[$i] = (array) $videogames[$i];
}

echo $twig->render('gallery_elements_copy.html.twig', ['items' => $vidcons]);
?>
