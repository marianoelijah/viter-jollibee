<?php

// check database connection
$conn = null;
$conn = checkDbConnection();
// make instance of classes
$departments = new Departments($conn);
// get $_GET data
$error = [];
$returnData = [];
if (array_key_exists("departmentsid", $_GET)) {
  // check data
  checkPayload($data);
  // get data
  $departments->departments_aid = $_GET['departmentsid'];
  $departments->departments_name = checkIndex($data, "departments_name");
  $departments->departments_created = date("Y-m-d H:i:s");
  $departments->departments_datetime = date("Y-m-d H:i:s");
  checkId($departments->departments_aid);

//checks current data to avoid same entries from being updated
$departments_name_old = checkIndex($data, 'departments_name_old');
compareName($departments, $departments_name_old, $departments->departments_name);
checkId($departments->departments_aid);

  // update
  $query = checkUpdate($departments);
  returnSuccess($departments, "departments", $query);
}

// return 404 error if endpoint not available
checkEndpoint();