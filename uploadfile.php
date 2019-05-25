<!DOCTYPE html>
<html>

<head>
<link rel="stylesheet" href="./StyleSheets/main.css" type="text/css">
</head>

<body>
    <div class="container">
<form method="post" enctype="multipart/form-data">
        <div class="mainHeader">
            <h1>Books API System</h1>
        </div>
        <div class="upload">
        <input type="file" name="fileToUpload" value="Select file to upload">
        <input type="submit" value="Upload file" name="submit">
        
        </div>
        </form>
    </div>

<?php
if (isset($_FILES)) {
    $check = true;
    if ($_FILES['fileToUpload']['type'] !== 'text/plain') {
        $check = false;
    }
   // print_r($_FILES);
   // echo '<hr>';
   //echo realpath('./');
  // die;
if ($check) {
       // $date = date('Ymd_His');
       // $file_id = uniqid();
      // $path = realpath('./') . '/UploadedFiles/' . $file_id; // . '_' . $_FILES['books_file']['name'];
      $path = realpath('./') . '/UploadedFiles/' . $_FILES['fileToUpload']['name'];
      // echo $path;
        // $sql = "INSERT INTO files (file, file_name) VALUES ('$file_id', '$_FILES["books_file"]["name"]')";
        if(move_uploaded_file($_FILES['fileToUpload']['tmp_name'], "$path")) {
            echo "Filen ". basename( $_FILES["fileToUpload"]["name"]). " har laddat up.";
            ?>
            <form action="user_data.php">
                <input type="submit" value="Försätta>>">
            </form>
        <?php
        } else {
            echo "Tyvär det var nån fel me laddaup fil.";
        }
    }
}
?>

</body>

</html>