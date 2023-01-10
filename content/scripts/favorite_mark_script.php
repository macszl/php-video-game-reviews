<?php

if(isset($_POST['favorite-submit']))
{
    require_once 'config_script.php';
    require_once 'helper_script.php';

    session_start();
    $vg_id = $_GET['id'];

    $user_id = getUserIdByName($conn, $_SESSION['name']);
    $date = getCurrentDateYMD();

    uploadFavoriteToDb($conn, $vg_id, $user_id, $date);
    header('Location: ../main/game-detail.php' . '?id=' . $vg_id);

}
?>