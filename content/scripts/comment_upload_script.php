<?php

if (isset($_POST['comment-submit'])) {
  require_once 'config_script.php';
  require_once 'helper_script.php';

  session_start();
  $vg_id = $_GET['id'];

  $user_id = getUserIdByName($conn, $_SESSION['name']);
  $review_content = $_POST['comment'];
  $date = getCurrentDateYMD();
  uploadReviewDetailsToDb($conn, $vg_id, $user_id, $review_content, $date);
  header('Location: ../main/game-detail.php' . '?id=' . $vg_id);
}

?>
