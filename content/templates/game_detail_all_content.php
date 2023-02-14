<?php 
    include '../templates/navbar.php';

    echo '<div class="all-content">';

    include '../templates/game_detail_container.php';
    include '../templates/game_detail_genre_lister.php';

    echo '<h2 class="game-detail-title-ext"style=" text-align: center;">Other games</h2> ';

    include '../templates/gallery_elements_small.php';

    echo ' <h2 class="game-detail-title-ext"style=" text-align: center;">Comments</h2>';
          
    
    if (isset($_SESSION['name'])) {
      if($_SESSION['name'] == 'admin') {
        echo '<button class="go-to-admin-form" onclick="window.location.href=\'../main/game-detail-edit.php?id=' . $_GET['id'] . '\'">Edit the game page</button>"';
      } 
      include '../templates/game_detail_comments.php';
    } else {
      echo '<h2 class="game-detail-title-ext"style=" text-align: center;">Please log in to see the comments</h2>';
    }

    echo '</div>';
?>
