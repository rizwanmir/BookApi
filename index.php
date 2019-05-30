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
<pre>
<?php
include "db/config.php";

if (isset($_FILES)) {
    $check = true;
// Check if the uploaded file is other than .txt file
    if ($_FILES['fileToUpload']['type'] !== 'text/plain') {
        $check = false;
    }

if ($check) {
   $file = $_FILES['fileToUpload']['name'];
    $file_id = uniqid();
    // save file in the folder with uniqeid
     $path = realpath('./') . '/UploadedFiles/' . $file_id;
    // query to save file name in database with unique id
      $sql = "INSERT INTO files (file_id, file_name) VALUES ('$file_id', '$file')";
      $result =$pdo->prepare($sql);
        $result-> execute();

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