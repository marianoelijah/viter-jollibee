<?php
// check database connection
$conn = null;
$conn = checkDbConnection();
// make instance of classes
$jobtitle = new JobTitle($conn);
// get $_GET data
$error = [];
$returnData = [];
if (array_key_exists("jobtitleid", $_GET)) {
  // get data
  $jobtitle->jobtitle_aid = $_GET['jobtitleid'];
  checkId($jobtitle->jobtitle_aid);
  

  $query = checkDelete($jobtitle);

  returnSuccess($jobtitle, "jobtitle", $query);
}

// return 404 error if endpoint not available
checkEndpoint();