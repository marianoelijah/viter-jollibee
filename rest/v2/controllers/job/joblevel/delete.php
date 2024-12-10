<?php
// check database connection
$conn = null;
$conn = checkDbConnection();
// make instance of classes
$joblevel = new JobLevel($conn);
// get $_GET data
$error = [];
$returnData = [];
if (array_key_exists("joblevelid", $_GET)) {
  // get data
  $joblevel->joblevel_aid = $_GET['joblevelid'];
  checkId($joblevel->joblevel_aid);
  

  $query = checkDelete($joblevel);

  returnSuccess($joblevel, "joblevel", $query);
}

// return 404 error if endpoint not available
checkEndpoint();