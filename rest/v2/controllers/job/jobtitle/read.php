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
  $jobtitle->jobtitle_aid = $_GET['jobtitleid'];
  checkId($jobtitle->jobtitle_aid);
  $query = checkReadById($jobtitle);
  http_response_code(200);
  getQueriedData($query);
}

if (empty($_GET)) {
  $query = checkReadAll($jobtitle);
  http_response_code(200);
  getQueriedData($query);
}

// return 404 error if endpoint not available
checkEndpoint();