<?php
// check database connection
$conn = null;
$conn = checkDbConnection();
// make instance of classes
$developer = new Developer($conn);
// get $_GET data
$error = [];
$returnData = [];
if (array_key_exists("developerid", $_GET)) {
  // get data
  $developer->user_developer_aid = $_GET['developerid'];
  $column_name = $data['item'];
  checkId($developer->user_developer_aid);


  $query = checkDelete($developer);
  checkDropColumnName($developer, $column_name);
  returnSuccess($developer, "Departments", $query);
}

// return 404 error if endpoint not available
checkEndpoint();