<?php
// check database connection
$conn = null;
$conn = checkDbConnection();
// make instance of classes
$role = new Role($conn);
// get $_GET data
$error = [];
$returnData = [];
if (array_key_exists("roleid", $_GET)) {
  // get data
  $role->role_aid = $_GET['roleid'];
  $column_name = $data['item'];
  checkId($role->role_aid);
  

  $query = checkDelete($role);
  checkDropColumnName($role, $column_name);

  returnSuccess($role, "Departments", $query);
}

// return 404 error if endpoint not available
checkEndpoint();