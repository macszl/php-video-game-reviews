<?php
if( isset($_POST['gallery-upload-submit']) ) {
  $title = $_POST['title'];
  $file = $_FILES['fileToUpload'];

  $fileName = $_FILES['fileToUpload']['name'];
  $fileTmpName = $_FILES['fileToUpload']['tmp_name'];
  $fileSize = $_FILES['fileToUpload']['size'];
  $fileError = $_FILES['fileToUpload']['error'];
  $fileType = $_FILES['fileToUpload']['type'];

  $fileExt = explode('.', $fileName);
  $fileActualExt = strtolower(end($fileExt));

  $allowed = array('jpg', 'jpeg', 'png');

  if(in_array($fileActualExt, $allowed)) {
    if($fileError === 0) {
      if($fileSize < 1000000) {
        $fileNameNew = uniqid('', true).".".$fileActualExt;
        $fileDestination = '../assets/images/gallery/'.$fileNameNew;
        move_uploaded_file($fileTmpName, $fileDestination);
        header("Location: ../etc/admin.php?uploadsuccess");
      } else {
        echo "Your file is too big!";
      }
    } else {
      echo "There was an error uploading your file!";
    }
  } else {
    echo "You cannot upload files of this type!";
  }
}   