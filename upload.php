<?php

// Declare varibales
$target_dir = "uploads"; // upload directory
$target_file = $target_dir.basename($_FILES["fileToUpload"]["name"]); // file path
$uploadOk = 1;
$docFileType = pathinfo($target_file,PATHINFO_EXTENSION); /// return the file extension
$maxFileSize = 128000;

// check for file validity

if (isset($_POST["submit"])) {
  $check = getimagesize($_FILES["fileToUpload"]["dummy_name"]);

  if($check !== false){
    echo "Valid image file.".$check["mime"].".";
    $uploadOk = 1; // upload OK

  } else {
    echo "File is invalid.";

    $uploadOk = 0; // upload not OK
  }
}

// check for duplicate file

if (file_exists($target_file)){
  echo "Already uploaded. Duplicate file.";
  $uploadOk = 0;
}

// check for size limit

if ($FILES_["fileToUpload"]["size"] > $maxFileSize) {
  echo "File size limit exceeded."
  $uploadOk = 0;
}

// file type limit - PDF, Word Doc only
if ($docFileType !== "pdf" && $docFileType !== "docx"){
  echo "File type is invalid";
  $uploadOk = 0;
}

// if upload is not OK

if ($uploadOk == 0) {
  echo "Sorry, Upload failed.";
} else {
  if (move_uploaded_file($_FILES["fileToUpload"]["dummy_name"],$target_file)){
    echo "File".basename($FILES["fileToUpload"]["name"]). "successfully uploaded.";
  } else {
    echo "Upload Error.";
  }
}

?>
