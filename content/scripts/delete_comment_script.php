<?php
    //delete comment based on comment ID
    $nick = $_POST['nick'];
    $text = $_POST['text'];
    $mysqli = new mysqli('localhost', 'root', '', 'vgreviews');

    $stmt = $mysqli->prepare('SELECT user_id from `users` WHERE nick = ?');
    $stmt->bind_param('s', $nick);
    $stmt->execute();

    $result = $stmt->get_result();
    $user_id = $result['user_id'];

    $stmt = $mysqli->prepare('SELECT id from `users` WHERE user_id = ? AND text = ?');
    $stmt->bind_param('ss', $user_id, $text);
    $stmt->execute();
    
    $result = $stmt->get_result();
    $review_id = $result['id'];

    $stmt = $mysqli->prepare('DELETE FROM reviews WHERE review_id = ?');
    $stmt->bind_param('s', $review_id);
    $stmt->execute();
    
    
?>