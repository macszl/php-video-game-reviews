<?php 
    //ban user based on his nick
    $nick = $_POST['nick'];
    $mysqli = new mysqli('localhost', 'root', '', 'vgreviews');

    $stmt = $mysqli->prepare('SELECT user_id from `users` WHERE nick = ?');
    $stmt->bind_param('s', $nick);
    $stmt->execute();

    $result = $stmt->get_result();
    $user_id = $result['user_id'];

    $stmt = $mysqli->prepare('DELETE FROM users WHERE user_id = ?');
    $stmt->bind_param('s', $review_id);
    $stmt->execute();  
?>