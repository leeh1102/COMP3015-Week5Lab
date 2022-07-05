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


foreach ($courses as $key => $value) {
    echo "<input type=\"checkbox\" class=\"courseNames\" id=\"courseStatus" . $key . "\" name=\"" . $key . "\"";
    if ($value->completed) {
        echo " checked";
    }
    echo ">";
    echo "<label for=\"courseName" . $key . "\">" . $key . "</label>";
    echo "<span><input type=\"button\" value=\"EDIT\" class=\"editButtons\" name=\"" . $key . "\"/></span>";
    echo "<span><input type=\"button\" value=\"DELETE\" class=\"deleteButtons\" id=\"deleteButtons\" name=\"" . $key . "\"/></span>";
    echo "<br>";
    echo "<br>";
}
