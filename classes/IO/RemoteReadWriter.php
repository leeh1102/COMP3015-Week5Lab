<?php
class RemoteReadWriter implements IReadWritable
{
  public function getCourses()
  {
    return "remote courses";
  }

  public function addCourse($course)
  {
    // some logic to add that course to the file
    return "remote course added";
  }

  public function deleteCourse($id)
  {
    // lookup course in file by id and remove it
    return "remote course deleted";
  }

  public function completeCourse($id)
  {
    // lookup the course in the file by id and mark it as completed
    return "remote course completed";
  }
  public function editCourse($course, $newCourse)
  {
    return "remote course updated";
  }
}
