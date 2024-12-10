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
  // check data
  checkPayload($data);
  // get data
  $joblevel->joblevel_aid = $_GET['joblevelid'];
  $joblevel->joblevel_name = checkIndex($data, "joblevel_name");
  $joblevel->joblevel_created = date("Y-m-d H:i:s");
  $joblevel->joblevel_datetime = date("Y-m-d H:i:s");
  checkId($joblevel->joblevel_aid);

//checks current data to avoid same entries from being updated
$joblevel_name_old = checkIndex($data, 'joblevel_name_old');
compareName($joblevel, $joblevel_name_old, $joblevel->joblevel_name);
checkId($joblevel->joblevel_aid);

  // update
  $query = checkUpdate($joblevel);
  returnSuccess($joblevel, "joblevel", $query);
}

// return 404 error if endpoint not available
checkEndpoint();