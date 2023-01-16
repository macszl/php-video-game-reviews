<?php
require_once '../scripts/config_script.php';
require_once '../scripts/helper_script.php';

$current_page = isset($_GET['page']) ? $_GET['page'] : 1;
$results_per_page = 12;

$videogames = [];
$vidcons = [];

if(isset( $_GET['query']))
{
  $query = $_GET['query'];
  $videogames = getLatestVideogamesObjectsByQuery($conn, $query);
}
else
{
  $videogames = getLatestVideogamesObjects($conn);
}

for ($i = 0; $i < count($videogames); $i++) {
  $vidcons[$i] = (array) $videogames[$i];
}

$vidcon_results = count($vidcons);
$vidcon_pages = ceil($vidcon_results / $results_per_page);

$start_index = ($current_page - 1) * $results_per_page;

$page_results = array_slice($vidcons, $start_index, $results_per_page);

echo $twig->render('gallery_elements_copy.html.twig', ['items' => $page_results]);
?>
