<?php
// check database connection
$conn = null;
$conn = checkDbConnection();
// make instance of classes
$developer = new Developer($conn);
// get $_GET data
$error = [];
$returnData = [];

if (array_key_exists("developerid", $_GET)) {
  $developer->user_developer_aid = $_GET['developerid'];
  checkId($developer->user_developer_aid);
  $query = checkReadById($developer);
  http_response_code(200);
  getQueriedData($query);
}

if (empty($_GET)) {
  $query = checkReadAll($developer);
  http_response_code(200);
  getQueriedData($query);
}

// return 404 error if endpoint not available
checkEndpoint();