<?php
// set http header
require '../../core/header.php';
// use needed functions
require '../../core/functions.php';
// require 'functions.php';
// use needed classes
require '../../models/children/children.php';


// check database connection

$conn = null;
$conn = checkDbConnection();
// make instance of classes
$children = new Children($conn);
// get payload
$body = file_get_contents("php://input");
$data = json_decode($body, true);
// get $_GET data
// validate api key
if (isset($_SERVER['HTTP_AUTHORIZATION'])) {
  checkApiKey();
  if (array_key_exists("childrenid", $_GET)) {
    // check data
    checkPayload($data);
    $children->children_aid = $_GET['childrenid'];
    $children->children_is_active = trim($data["isActive"]);
    checkId($children->children_aid);
    $query = checkActive($children);
    http_response_code(200);
    returnSuccess($children, "children", $query);
  }
  // return 404 error if endpoint not available
  checkEndpoint();
}

http_response_code(200);
// when authentication is cancelled
// header('HTTP/1.0 401 Unauthorized');
checkAccess();
