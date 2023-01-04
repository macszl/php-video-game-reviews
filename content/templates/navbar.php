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
        'href' => '../etc/admin.php',
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
  echo $twig->render('navbar.html.twig', [
    'navbar_brand' => 'VGReviews.com',
    'navbar_items' => [
      [
        'href' => '../login/profile.php',
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
