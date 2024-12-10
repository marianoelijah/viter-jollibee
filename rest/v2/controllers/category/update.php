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
  // check data
  checkPayload($data);
  // get data
  $other->other_aid = $_GET['otherid'];
  $other->other_name = checkIndex($data, "other_name");
  $other->other_email = checkIndex($data, "other_email");
  $other->other_role_id = checkIndex($data, "other_role_id");
  $other->other_created = date("Y-m-d H:i:s");
  $other->other_datetime = date("Y-m-d H:i:s");
  checkId($other->other_aid);

//checks current data to avoid same entries from being updated
$other_name_old = checkIndex($data, 'other_name_old');
compareName($other, $other_name_old, $other->other_name);
checkId($other->other_aid);

  // update
  $query = checkUpdate($other);
  returnSuccess($other, "other", $query);
}

// return 404 error if endpoint not available
checkEndpoint();