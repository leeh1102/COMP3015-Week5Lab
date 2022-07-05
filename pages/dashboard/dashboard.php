<?php
require_once("../loginAndLogOut/useAuth.php");

$user = getLoggedInUser();
// Restricted route
if (!$user) {
  header("location: ../loginAndLogOut/login.php");
  exit();
}

require("../../courseManager.php");
