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
  // get data
  $advertisement->advertisement_aid = $_GET['advertisementid'];
  checkId($advertisement->advertisement_aid);
  

  $query = checkDelete($advertisement);

  returnSuccess($advertisement, "advertisement", $query);
}

// return 404 error if endpoint not available
checkEndpoint();