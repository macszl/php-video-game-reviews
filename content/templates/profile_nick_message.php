<?php
if (isset($_GET['id'])) {
  include_once '../scripts/config_script.php';
  $user_id = $_GET['id'];
  $sql = "SELECT * FROM users WHERE user_id = $user_id";

  $result = mysqli_query($conn, $sql);
  $resultCheck = mysqli_num_rows($result);
  $nickFromUid = '';
  while ($row = mysqli_fetch_assoc($result)) {
    $nickFromUid = $row['name'];
  }

  $username = '';
  if( isset($_SESSION['name']))
  {
    $username = $_SESSION['name'];
  }
 
  if ($username == $nickFromUid) {
    echo '<h2 class="gallery-title">
                Welcome ' .
      $nickFromUid .
      '! Check out your favourites and your latest reviews.
            </h2>';
  } else {
    echo '<h2 class="gallery-title">
                This is the page of ' .
      $nickFromUid .
      '. Check out their favourites and latest reviews.
            </h2>';
  }
}

?>
