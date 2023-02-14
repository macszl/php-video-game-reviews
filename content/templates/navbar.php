<?php
if (!isset($_SESSION['name']) || empty($_SESSION['name'])) {
  echo $twig->render('navbar.html.twig', [
    'navbar_brand' => 'VGReviews.com',
    'navbar_items' => [
      [
        'href' => '../etc/contact.php',
        'text' => 'Contact',
      ],
      [
        'href' => '../login/login.php',
        'text' => 'Login',
      ],
    ],
  ]);
} elseif ($_SESSION['name'] == 'admin') {
  echo $twig->render('navbar.html.twig', [
    'navbar_brand' => 'VGReviews.com',
    'navbar_items' => [
      [
        'href' => '../main/game-detail-upload.php',
        'text' => 'Admin',
      ],
      [
        'href' => '../etc/contact.php',
        'text' => 'Contact',
      ],
      [
        'href' => '../login/logout.php',
        'text' => 'Logout',
      ],
    ],
  ]);
} else {
  include_once '../scripts/config_script.php';

  $user_name = $_SESSION['name'];
  $sql = "SELECT * FROM `users` WHERE `name` = '$user_name' ";

  $result = mysqli_query($conn, $sql);
  $resultCheck = mysqli_num_rows($result);
  $uID = '';
  while ($row = mysqli_fetch_assoc($result)) {
    $uID = $row['user_id'];
  }

  echo $twig->render('navbar.html.twig', [
    'navbar_brand' => 'VGReviews.com',
    'navbar_items' => [
      [
        'href' => '../login/profile_page.php?id=' . $uID,
        'text' => 'Profile',
      ],
      [
        'href' => '../etc/contact.php',
        'text' => 'Contact',
      ],
      [
        'href' => '../login/logout.php',
        'text' => 'Logout',
      ],
    ],
  ]);
}
?>
