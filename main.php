<?php
// Import all of our files
include("./interfaces/IReadWritable.php");
include("./classes/CourseManager.php");
include("./classes/Course.php");
include("./classes/IO/LocalReadWriter.php");
include("./classes/IO/RemoteReadWriter.php");



$courseName = "";

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
    //     echo "<label for=\"courseName" . $key . "\">" . $key . "</label>";
    //     echo "<br>";
    //     echo "<br>";

}
// header('Location: /index.php?id=' . $_POST['title']);
// function debug_to_console($data)
// {
//     $output = $data;
//     if (is_array($output))
//         $output = implode(
//             ',',
//             $output
//         );

//     echo "<script>console.log('Debug Objects: " . $output . "' );</script>";
// }
