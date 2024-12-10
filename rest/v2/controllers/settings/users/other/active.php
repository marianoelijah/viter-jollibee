<?php
// set http header
require '../../../../core/header.php';
// use needed functions
require '../../../../core/functions.php';
// require 'functions.php';
// use needed classes
require '../../../../models/settings/users/other/Other.php';
// get payload

// check database connection

$conn = null;
$conn = checkDbConnection();
// make instance of classes
$other = new Other($conn);
// get payload
$body = file_get_contents("php://input");
$data = json_decode($body, true);
// get $_GET data
// validate api key
if (isset($_SERVER['HTTP_AUTHORIZATION'])) {
  //checkApiKey();
  if (array_key_exists("otherid", $_GET)) {
    // check data
    checkPayload($data);
    $other->other_aid = $_GET['otherid'];
    $other->other_is_active = trim($data["isActive"]);
    checkId($other->other_aid);
    $query = checkActive($other);
    http_response_code(200);
    returnSuccess($other, "other", $query);
  }
  // return 404 error if endpoint not available
  checkEndpoint();
}

http_response_code(200);
// when authentication is cancelled
// header('HTTP/1.0 401 Unauthorized');
checkAccess();
