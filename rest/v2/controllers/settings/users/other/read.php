<?php
// check database connection
$conn = null;
$conn = checkDbConnection();
// make instance of classes
$other = new Other($conn);
// get $_GET data
$error = [];
$returnData = [];

if (array_key_exists("otherid", $_GET)) {
  $other->other_aid = $_GET['otherid'];
  checkId($other->other_aid);
  $query = checkReadById($other);
  http_response_code(200);
  getQueriedData($query);
}

if (empty($_GET)) {
  $query = checkReadAll($other);
  http_response_code(200);
  getQueriedData($query);
}

// return 404 error if endpoint not available
checkEndpoint();