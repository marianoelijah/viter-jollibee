<?php
// check database connection
$conn = null;
$conn = checkDbConnection();
// make instance of classes
$advertisement = new Advertisement($conn);
// get $_GET data
$error = [];
$returnData = [];

if (array_key_exists("advertisementid", $_GET)) {
  $advertisement->advertisement_aid = $_GET['advertisementid'];
  checkId($advertisement->advertisement_aid);
  $query = checkReadById($advertisement);
  http_response_code(200);
  getQueriedData($query);
}

if (empty($_GET)) {
  $query = checkReadAll($advertisement);
  http_response_code(200);
  getQueriedData($query);
}

// return 404 error if endpoint not available
checkEndpoint();