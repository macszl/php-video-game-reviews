<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0"
    />
    <title>VG Reviews Example detail page</title>
    <link
      rel="stylesheet"
      href="../css/style.css"
    />
  </head>

  <body>
    <?php
    session_start();
    require '../../vendor/autoload.php';

    $loader = new Twig\Loader\FilesystemLoader('../templates');
    $twig = new Twig\Environment($loader, [
      'cache' => '../../dist',
    ]);

    include '../templates/game_detail_all_content.php';
    ?>    
    <?php include '../components/footer.php'; ?>
  </body>
  <script>
    function banUser() {
      //get user nick
      var nick = document.getElementById("nick")
      var formData = new FormData();
      formData.append(nick);

      var xhr = new XMLHttpRequest();
      xhr.open("POST", "../scripts/comment_ban_script.php", true);
      xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
      xhr.send(formData);
    }
    function deleteComment() {
      
      
      var nick = document.getElementById("nick")
      var text = document.getElementById("text")
      //we need same 
      var formData = new FormData();
      formData.append(nick);
      formData.append(text);

      var xhr = new XMLHttpRequest();
      xhr.open("POST", "../scripts/delete_comment_script.php", true);
      xhr.send(formData);
    }

    
  </script>
</html>
