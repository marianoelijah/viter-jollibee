<?php
// check database connection
$conn = null;
$conn = checkDbConnection();
// make instance of classes
$other = new Other($conn);
// get $_GET data
$error = [];
$returnData = [];
if (array_key_exists("otherid", $_GET)) {
  // get data
  $other->other_aid = $_GET['otherid'];
  checkId($other->other_aid);
  

  $query = checkDelete($other);

  returnSuccess($other, "other", $query);
}

// return 404 error if endpoint not available
checkEndpoint();