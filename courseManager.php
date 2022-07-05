<?php
const MAX_FILESIZE = 20000000000;
const FILE_TYPE = "image/jpeg";
$picture = "";

require 'vendor/autoload.php';

use Cloudinary\Configuration\Configuration;
use Cloudinary\Api\Upload\UploadApi;



Configuration::instance([
    'cloud' => [
        'cloud_name' => 'dtl0bs7vs',
        'api_key' => '225837818512211',
        'api_secret' => '0JN2vsPgA1GFIrdPztc92iMkKkA'
    ],
    'url' => [
        'secure' => true
    ]
]);

if (isset($_FILES["profile_picture"])) {
    if ($_FILES["profile_picture"]["type"] == FILE_TYPE && $_FILES["profile_picture"]["size"] <= MAX_FILESIZE) {
        $picture = "upload/" . md5(time() . $_FILES["profile_picture"]["name"]) . "jpeg";
        $filename = $_FILES["profile_picture"]["tmp_name"];
        // upload to local file
        $result = move_uploaded_file($filename, $picture);
        // upload to Cloudinary
        $result = (new UploadApi())->upload($picture);
        // Delete the uploaded data from local file
        // unlink($picture);
    } else {
        header('Location: /courseManager.php');
        exit;
    }
}
?>
<?php include_once "header.php"; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../courseManager.css">
    <title>Week 5 Lab - Course Manager</title>
</head>

<body>
    <h1>Course Manager</h1>
    <form enctype="multipart/form-data" method="post" id="coverPhotoForm">
        <span><input type="file" name="profile_picture"></span>
        <span><input class="uploadButton" type="submit" value="UPLOAD"></span>
    </form>
    <div>
        <img src="<?php echo $picture; ?>" class="uploadedImage">
    </div>
    <form enctype="multipart/form-data" action="../../form_processor.php" method="post" id="courseForm">
        <input type="text" name="courseNameToAdd" id="courseName" placeholder="ex.COMP3015" />
        <span><input type="submit" value="ADD" /></span>
        <br>
        <br>
        <?php include("main.php") ?>
        <br>
        <br>
    </form>
    <script>
        document.querySelectorAll(".courseNames").forEach(e => {
            e.addEventListener("change", event => {
                const courseName = event.target.getAttribute("name");
                const form = document.getElementById("courseForm");
                const input = document.createElement("input");
                input.setAttribute("type", "hidden");
                input.setAttribute("name", "courseNameToToggle");
                input.setAttribute("value", courseName);
                form.appendChild(input);
                form.submit();
            });
        });
        document.querySelectorAll(".deleteButtons").forEach(e => {
            e.addEventListener("click", event => {
                const courseName = event.target.getAttribute("name");
                const form = document.getElementById("courseForm");
                const input = document.createElement("input");
                input.setAttribute("type", "hidden");
                input.setAttribute("name", "courseNameToDelete");
                input.setAttribute("value", courseName);
                form.appendChild(input);
                form.submit();
            });
        });

        document.querySelectorAll(".editButtons").forEach(e => {
            e.addEventListener("click", event => {
                const newCourseName = prompt("Please enter new course name.");
                const courseName = event.target.getAttribute("name");
                const form = document.getElementById("courseForm");
                var inputOne = document.createElement("input");
                inputOne.setAttribute("type", "hidden");
                inputOne.setAttribute("name", "courseNameToEdit");
                inputOne.setAttribute("value", courseName);
                form.appendChild(inputOne);
                var inputTwo = document.createElement("input");
                inputTwo.setAttribute("type", "hidden");
                inputTwo.setAttribute("name", "courseNameToEditTo");
                inputTwo.setAttribute("value", newCourseName);
                form.appendChild(inputTwo);
                form.submit();
            });
        });
    </script>

    <footer>
    </footer>

</body>

</html>

<?php include_once "footer.php"; ?>