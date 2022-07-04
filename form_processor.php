<?php
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
}

$courseNameToDelete = $_POST['courseNameToDelete'];
if (isset($courseNameToDelete) && $courseNameToDelete != "") {
    $localCourseManager->deleteCourse($courseNameToDelete);
}

$courseNameToEdit = $_POST['courseNameToEdit'];
$courseNameToEditTo = $_POST['courseNameToEditTo'];
if (
    isset($courseNameToEdit) && $courseNameToEdit != ""
    && isset($courseNameToEditTo) && $courseNameToEditTo != ""
) {
    $localCourseManager->editCourse($courseNameToEdit, $courseNameToEditTo);
}

header('Location: /courseManager.php');
