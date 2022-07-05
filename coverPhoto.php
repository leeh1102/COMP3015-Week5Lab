<?php
// const MAX_FILESIZE = 20000000000;
// const FILE_TYPE = "image/jpeg";
// $picture = "";

// require 'vendor/autoload.php';
// use Cloudinary\Configuration\Configuration;
// use Cloudinary\Api\Upload\UploadApi;

// Configuration::instance([
//   'cloud' => [
//     'cloud_name' => 'dtl0bs7vs', 
//     'api_key' => '225837818512211', 
//     'api_secret' => '0JN2vsPgA1GFIrdPztc92iMkKkA'],
//   'url' => [
//     'secure' => true]]);

// if (isset($_FILES["profile_picture"])) {
//     if ($_FILES["profile_picture"]["type"] == FILE_TYPE && $_FILES["profile_picture"]["size"] <= MAX_FILESIZE) {
//         $picture = "upload/" . md5(time() . $_FILES["profile_picture"]["name"]) . "jpeg";
        // $filename = $_FILES["profile_picture"]["tmp_name"];
        // upload to local file
        // $result = move_uploaded_file($filename, $picture);
        // upload to Cloudinary
        // $result = (new UploadApi())->upload($picture);
        // print associattive array
        // print "<pre>";
        // print_r($result);
        // print "</pre>";
        // Delete the uploaded data from local file
        // unlink($picture);
//     } else {
//         echo "invalid profile picture!";
//         exit;
//     }
// }

// header('Location: /courseManager.php');
