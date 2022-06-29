<?php
class LocalReadWriter implements IReadWritable
{
  public function getCourses()
  {
    $data = json_decode(file_get_contents("./courseData.json", true));
    return $data;
  }

  public function addCourse($course)
  {
    $data = $this->getCourses();
    $newCourse = array(
      "id" => $course,
      "completed" => false
    );
    $data->$course = $newCourse;
    if (!file_put_contents("./courseData.json", json_encode($data, JSON_PRETTY_PRINT))) {
      echo "Error.";
    } else {
      echo "comepleted!";
    }
  }


  public function deleteCourse($course)
  {
    $data = $this->getCourses();
    unset($data->$course);
    if (!file_put_contents("./courseData.json", json_encode($data, JSON_PRETTY_PRINT))) {
      echo "Error.";
    } else {
      echo "comepleted!";
    }
  }

  public function completeCourse($course)
  {
    $data = $this->getCourses();
    $data->$course->completed = !$data->$course->completed;
    if (!file_put_contents("./courseData.json", json_encode($data, JSON_PRETTY_PRINT))) {
      echo "Error.";
    } else {
      echo "comepleted!";
    }
  }

  public function editCourse($course, $newCourse)
  {
    $data = $this->getCourses();
    if ($newCourse != "" && $newCourse != "null") {
      $data->$newCourse = $data->$course;
      unset($data->$course);
      if (!file_put_contents("./courseData.json", json_encode($data, JSON_PRETTY_PRINT))) {
        echo "Error.";
      } else {
        echo "comepleted!";
      }
    } else {
      echo "Erorr.2";
    }
  }
}
