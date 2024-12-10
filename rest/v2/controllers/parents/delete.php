<?php
// check database connection
$conn = null;
$conn = checkDbConnection();
// make instance of classes
$parents = new Parents($conn);
// get $_GET data
$error = [];
$returnData = [];
if (array_key_exists("parentsid", $_GET)) {
  // get data
  $parents->parents_aid = $_GET['parentsid'];
  checkId($parents->parents_aid);
  

  $query = checkDelete($parents);

  returnSuccess($parents, "parents", $query);
}

// return 404 error if endpoint not available
checkEndpoint();