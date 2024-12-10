<?php
// set http header
require '../../../core/header.php';
// use needed functions
require '../../../core/functions.php';
// require 'functions.php';
// use needed classes
require '../../../models/settings/departments/Departments.php';
// get payload

// check database connection

$conn = null;
$conn = checkDbConnection();
// make instance of classes
$departments = new Departments($conn);
// get payload
$body = file_get_contents("php://input");
$data = json_decode($body, true);
// get $_GET data
// validate api key
if (isset($_SERVER['HTTP_AUTHORIZATION'])) {
  //checkApiKey();
  if (array_key_exists("departmentsid", $_GET)) {
    // check data
    checkPayload($data);
    $departments->departments_aid = $_GET['departmentsid'];
    $departments->departments_is_active = trim($data["isActive"]);
    checkId($departments->departments_aid);
    $query = checkActive($departments);
    http_response_code(200);
    returnSuccess($departments, "departments", $query);
  }
  // return 404 error if endpoint not available
  checkEndpoint();
}

http_response_code(200);
// when authentication is cancelled
// header('HTTP/1.0 401 Unauthorized');
checkAccess();
