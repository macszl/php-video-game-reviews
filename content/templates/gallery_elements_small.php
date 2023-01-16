<?php
require_once '../scripts/config_script.php';
require_once '../scripts/helper_script.php';

$videogames = getLatestVideogamesObjects($conn);;
$vidcons = [];
for ($i = 0; $i < 4; $i++) {
  $vidcons[$i] = (array) $videogames[$i];
}

echo $twig->render('gallery_elements_copy.html.twig', ['items' => $vidcons]);
?>
