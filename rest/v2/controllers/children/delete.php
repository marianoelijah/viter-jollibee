<?php
// check database connection
$conn = null;
$conn = checkDbConnection();
// make instance of classes
$children = new Children($conn);
// get $_GET data
$error = [];
$returnData = [];
if (array_key_exists("childrenid", $_GET)) {
  // get data
  $children->children_aid = $_GET['childrenid'];
  checkId($children->children_aid);
  

  $query = checkDelete($children);

  returnSuccess($children, "Children", $query);
}

// return 404 error if endpoint not available
checkEndpoint();