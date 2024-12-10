<?php
// set http header
require '../../../../core/header.php';
// use needed functions
require '../../../../core/functions.php';
// require 'functions.php';
// use needed classes
require '../../../../models/settings/users/role/Role.php';
// get payload

// check database connection

$conn = null;
$conn = checkDbConnection();
// make instance of classes
$role = new Role($conn);
// get payload
$body = file_get_contents("php://input");
$data = json_decode($body, true);
// get $_GET data
// validate api key
if (isset($_SERVER['HTTP_AUTHORIZATION'])) {
  //checkApiKey();
  if (array_key_exists("roleid", $_GET)) {
    // check data
    checkPayload($data);
    $role->role_aid = $_GET['roleid'];
    $role->role_is_active = trim($data["isActive"]);
    checkId($role->role_aid);
    $query = checkActive($role);
    http_response_code(200);
    returnSuccess($role, "role", $query);
  }
  // return 404 error if endpoint not available
  checkEndpoint();
}

http_response_code(200);
// when authentication is cancelled
// header('HTTP/1.0 401 Unauthorized');
checkAccess();
