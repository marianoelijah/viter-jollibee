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
  // check data
  checkPayload($data);
  // get data
  $parents->parents_aid = $_GET['parentsid'];
  $parents->parents_name = checkIndex($data, "parents_name");
  $parents->parents_email = checkIndex($data, "parents_email");
  $parents->parents_address = checkIndex($data, "parents_address");
  $parents->parents_created = date("Y-m-d H:i:s");
  $parents->parents_datetime = date("Y-m-d H:i:s");
  checkId($parents->parents_aid);

//checks current data to avoid same entries from being updated
$parents_name_old=checkIndex($data, 'parents_name_old');
compareName($parents, $parents_name_old, $parents->parents_name);
checkId($parents->parents_aid);

  // update
  $query = checkUpdate($parents);
  returnSuccess($parents, "parents", $query);
}

// return 404 error if endpoint not available
checkEndpoint();