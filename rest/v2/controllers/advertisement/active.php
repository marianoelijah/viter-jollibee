<?php
// set http header
require '../../core/header.php';
// use needed functions
require '../../core/functions.php';
// require 'functions.php';
// use needed classes
require '../../models/advertisement/Advertisement.php';
// get payload

// check database connection

$conn = null;
$conn = checkDbConnection();
// make instance of classes
$advertisement = new Advertisement($conn);
// get payload
$body = file_get_contents("php://input");
$data = json_decode($body, true);
// get $_GET data
// validate api key
if (isset($_SERVER['HTTP_AUTHORIZATION'])) {
  //checkApiKey();
  if (array_key_exists("advertisementid", $_GET)) {
    // check data
    checkPayload($data);
    $advertisement->advertisement_aid = $_GET['advertisementid'];
    $advertisement->advertisement_is_active = trim($data["isActive"]);
    checkId($advertisement->advertisement_aid);
    $query = checkActive($advertisement);
    http_response_code(200);
    returnSuccess($advertisement, "advertisement", $query);
  }
  // return 404 error if endpoint not available
  checkEndpoint();
}

http_response_code(200);
// when authentication is cancelled
// header('HTTP/1.0 401 Unauthorized');
checkAccess();