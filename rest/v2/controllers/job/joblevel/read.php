<?php
// check database connection
$conn = null;
$conn = checkDbConnection();
// make instance of classes
$joblevel = new JobLevel($conn);
// get $_GET data
$error = [];
$returnData = [];

if (array_key_exists("joblevelid", $_GET)) {
  $joblevel->joblevel_aid = $_GET['joblevelid'];
  checkId($joblevel->joblevel_aid);
  $query = checkReadById($joblevel);
  http_response_code(200);
  getQueriedData($query);
}

if (empty($_GET)) {
  $query = checkReadAll($joblevel);
  http_response_code(200);
  getQueriedData($query);
}

// return 404 error if endpoint not available
checkEndpoint();