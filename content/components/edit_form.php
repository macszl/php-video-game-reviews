<form action="../scripts/game_detail_edit.php" method="post">
    <label for="title">Title:</label>
    <input type="title" id="title" name="title" required>
    
    <br>

    <label for="image_path">Image path:</label>
    <input type="image_path" id="image_path" name="image_path" required>

    <br>

    <label for="description">Description</label>
    <input type="description" id="description" name="description" required>

    <br>
    
    <input type="hidden" name="token" value="<?php echo $_SESSION['token']; ?>">
    <input type="submit" value="Save">
</form>