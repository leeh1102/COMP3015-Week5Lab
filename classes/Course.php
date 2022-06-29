<?php

class Course {
  private string $name;
  private bool $status;

  public function __construct(string $name, bool $status) {
    $this->setName($name);
    $this->status = $status;
  }
  public function getName() {
    return $this->name;
  }

  public function getStatus() {
    return $this->status;
  }

  public function setName($name) {
    if(strlen($name) == 0) {
      throw new Exception("Name length is not long enough");
    } else {
      $this->name = $name;
    }
  }
}