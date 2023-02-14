<div class="center-flexbox">
    <div class="edit-form-wrapper">
        <h2 class="title"> Add a game to DB</h2>
        <form class="edit-form" action="edit_page.php" method="post" enctype="multipart/form-data">
            <label class="edit-title-label" for="title">Add title:</label>
            <input class="edit-title-textarea" type="text" id="title" name="title">
            
            <label class="edit-image-label" for="image">Add image:</label>
            <input class="edit-image-fileinput" type="file" id="image" name="image">

            <label class="edit-desc-label" for="text">Add description:</label>
            <textarea class="edit-desc-textarea" id="text" name="text"></textarea>

        </form>
        <form class="edit-form">
            <label class="edit-genre-label" for="items">Add genre:</label>
            <div class="edit-genre-interactives">
                <select class="edit-genre-dropdown-menu" id="items" name="items">
                    <?php
                    $mysqli = new mysqli('localhost', 'root', '', 'vgreviews');
                    $result = $mysqli->query('SELECT * FROM genres');
                    while ($row = $result->fetch_assoc()) { ?>
                        <option class="edit-genre-option" value="<?php echo $row['title']; ?>">
                            <?php echo $row['title']; ?>
                        </option>
                    <?php }
                    ?>
                </select>
                <button class="edit-genre-button" type="button" onclick="addToList()">Add to List</button>
            </div>
        </form>
        <div class="edit-form-genre-list" id="list"></div>

        
        <input type="hidden" name="list" id="list-input">
        <div class="save-buttons">
            <button class="edit-form-cancel" type="button" onclick="window.location.href='../main/gallery.php'">Cancel</button>
            <input class="edit-form-submit" type="submit" onclick="submitForm()" value="Save Form">
        </div>
    </div>
</div>

<script>
    function addToList() {
        var select = document.getElementById("items");
        var selectedValue = select.options[select.selectedIndex].value;
        var list = document.getElementById("list");
        var listInput = document.getElementById("list-input");
        var existingItems = listInput.value.split(',');

        if(existingItems.includes(selectedValue)){
            alert("Item already exists in the list");
        }else{
            var newItem = document.createElement("div");
            newItem.className = "edit-form-genre-list-item";
            newItem.innerHTML = "<div class=edit-form-genre-list-item-text>" + selectedValue + "</div>" 
            + " <button class='edit-form-genre-list-item-remove' type='button' onclick='removeFromList(this)'>Remove</button>";
            list.appendChild(newItem);
            listInput.value = listInput.value + "," + selectedValue;
        }
    }

    function removeFromList(item) {
        var list = document.getElementById("list");
        var listInput = document.getElementById("list-input");
        list.removeChild(item.parentNode);
        listInput.value = listInput.value.replace("," + item.parentNode.innerText, "");
    }

    function submitForm() {
        var title = document.getElementById("title").value;
        var description = document.getElementById("text").value;
        var genres = document.getElementById("list-input").value;
        var image = document.getElementById("image").files[0];

        var formData = new FormData();
        formData.append("title", title);
        formData.append("text", description);
        formData.append("genres", genres);
        formData.append("image", image);

        var xhr = new XMLHttpRequest();
        xhr.open("POST", "../scripts/gallery_upload_script.php", true);
        xhr.send(formData);
    }
</script>
