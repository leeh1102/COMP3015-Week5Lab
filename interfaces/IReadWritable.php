<?php
interface IReadWritable
{
    public function getCourses();
    public function addCourse(Course $course);
    public function deleteCourse(string $courseName);
    public function completeCourse(string $courseName);
    public function editCourse(string $courseToEdit, string $courseToEditTo);
}
