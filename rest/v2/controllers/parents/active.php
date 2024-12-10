<?php
// set http header
require '../../core/header.php';
// use needed functions
require '../../core/functions.php';
// require 'functions.php';
// use needed classes
require '../../models/parents/parents.php';


// check database connection

$conn = null;
$conn = checkDbConnection();
// make instance of classes
$parents = new Parents($conn);
// get payload
$body = file_get_contents("php://input");
$data = json_decode($body, true);
// get $_GET data
// validate api key
if (isset($_SERVER['HTTP_AUTHORIZATION'])) {
  checkApiKey();
  if (array_key_exists("parentsid", $_GET)) {
    // check data
    checkPayload($data);
    $parents->parents_aid = $_GET['parentsid'];
    $parents->parents_is_active = trim($data["isActive"]);
    checkId($parents->parents_aid);
    $query = checkActive($parents);
    http_response_code(200);
    returnSuccess($parents, "parents", $query);
  }
  // return 404 error if endpoint not available
  checkEndpoint();
}

http_response_code(200);
// when authentication is cancelled
// header('HTTP/1.0 401 Unauthorized');
checkAccess();
