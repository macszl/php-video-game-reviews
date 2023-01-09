<div class="gallery-upload">
  <form class="upload" action="../scripts/gallery_upload_script.php" method="post" enctype="multipart/form-data">
    <label class="label-text">Upload new game</label>
    
    <div class="input-file-group">
      <label class="input-file-label">Video game title</label>
      <input class="input-text" type="text" placeholder="Enter video game title"name="title">
    </div>
    
    <div class="input-file-group">
      <label class="input-file-label">Select genre</label>
      <select class="select-genre" type="genre" name="genre"></select>
    </div>

    <div class="input-file-group">
      <label class="input-file-label">Upload image</label>
      <input class="input-file" type="file" name="fileToUpload" id="fileToUpload"/>
    </div>
    
    <button 
     class="button"
     type="gallery-upload-submit" 
     name="gallery-upload-submit">
      Upload
    </button>
  </form>
</div>