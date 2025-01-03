<?php
// set http header
require '../../../../../core/header.php';
// use needed functions
require '../../../../../core/functions.php';
// require 'functions.php';
// use needed classes
require '../../../../../models/developer/settings/user/developer/Developer.php';
// get payload

// check database connection

$conn = null;
$conn = checkDbConnection();
// make instance of classes
$developer = new Developer($conn);
// get payload
$body = file_get_contents("php://input");
$data = json_decode($body, true);
// get $_GET data
// validate api key
if (isset($_SERVER['HTTP_AUTHORIZATION'])) {
  //checkApiKey();
  if (array_key_exists("developerid", $_GET)) {
    // check data
    checkPayload($data);
    $developer->user_developer_aid = $_GET['developerid'];
    $developer->user_developer_is_active = trim($data["isActive"]);
    checkId($developer->user_developer_aid);
    $query = checkActive($developer);
    http_response_code(200);
    returnSuccess($developer, "developer", $query);
  }
  // return 404 error if endpoint not available
  checkEndpoint();
}

http_response_code(200);
// when authentication is cancelled
// header('HTTP/1.0 401 Unauthorized');
checkAccess();