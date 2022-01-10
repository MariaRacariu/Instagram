<?php

require_once 'config.php';

$errMessage = '';
$filename = $_FILES['filename']['name'];
$target_directory = "user_image/";
$tmpFile = $_FILES['filename']['tmp_name'];
$target_file = $target_directory . $filename;

$content = $_POST['content'];


if(isset($_POST['submit']))
{
    if(move_uploaded_file($tmpFile, $target_file)){
        $sql = $pdo->prepare("INSERT INTO photos (URL, user_id, caption) VALUES (:URL, :user_id, :caption)");
        $sql->bindValue(':URL', $target_directory.$filename);
        $sql->bindValue(':user_id', 1);
        $sql->bindValue(':caption', $content);
        $sql->execute();
        echo 'Uploaded file valid';
    }else {
        $errMessage = 'No file';
    echo $errMessage;
    }
}
?>