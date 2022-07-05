<?php
require_once("../loginAndLogout/useAuth.php");

$user = getLoggedInUser();
// Restricted route
if (!$user) {
  header("location: ../loginAndLogout/login.php");
  exit();
}

// require("dashboard.view.php");
require("../../courseManager.php");
