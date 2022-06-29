<?php
// Import all of our files
include("./interfaces/IReadWritable.php");
include("./classes/CourseManager.php");
include("./classes/Course.php");
include("./classes/IO/LocalReadWriter.php");
include("./classes/IO/RemoteReadWriter.php");

$localCourseManager = new CourseManager("john123", new LocalReadWriter());
$remoteCourseManager = new CourseManager("john123", new RemoteReadWriter());
$courses = $localCourseManager->getCourses();

$newCourse = $_POST['courseNameToAdd'];
if (isset($newCourse) && $newCourse != "") {
    $localCourseManager->addCourse($newCourse);
}

$courseNameToToggle = $_POST['courseNameToToggle'];
if (isset($courseNameToToggle) && $courseNameToToggle != "") {
    $localCourseManager->completeCourse($courseNameToToggle);
    // header('Location: /index.php?id=' . $_POST['courseNameToToggle']);
}

$courseNameToDelete = $_POST['courseNameToDelete'];
if (isset($courseNameToDelete) && $courseNameToDelete != "") {
    $localCourseManager->deleteCourse($courseNameToDelete);
    // header('Location: /index.php?id=' . $_POST['courseNameToToggle']);
}

$courseNameToEdit = $_POST['courseNameToEdit'];
$courseNameToEditTo = $_POST['courseNameToEditTo'];
echo $courseNameToEdit;
echo "<br>";
echo $courseNameToEditTo;
echo "<br>";
if (
    isset($courseNameToEdit) && $courseNameToEdit != ""
    && isset($courseNameToEditTo) && $courseNameToEditTo != ""
) {
    $localCourseManager->editCourse($courseNameToEdit, $courseNameToEditTo);
    // header('Location: /index.php?id=' . $_POST['courseNameToToggle']);
}

header('Location: /index.php');



?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TEST</title>
</head>

<body>
    <!-- <p>Course name: <?php echo $_POST["courseName"] ?></p> -->
</body>

</html>