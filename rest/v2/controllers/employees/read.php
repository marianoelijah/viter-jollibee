<?php
// check database connection
$conn = null;
$conn = checkDbConnection();
// make instance of classes
$departments = new Departments($conn);
// get $_GET data
$error = [];
$returnData = [];

if (array_key_exists("departmentsid", $_GET)) {
  $departments->departments_aid = $_GET['departmentsid'];
  checkId($departments->departments_aid);
  $query = checkReadById($departments);
  http_response_code(200);
  getQueriedData($query);
}

if (empty($_GET)) {
  $query = checkReadAll($departments);
  http_response_code(200);
  getQueriedData($query);
}

// return 404 error if endpoint not available
checkEndpoint();