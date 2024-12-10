<?php

// check database connection
$conn = null;
$conn = checkDbConnection();
// make instance of classes
$jobtitle = new JobTitle($conn);
// get $_GET data
$error = [];
$returnData = [];
if (array_key_exists("jobtitleid", $_GET)) {
  // check data
  checkPayload($data);
  // get data
  $jobtitle->jobtitle_aid = $_GET['jobtitleid'];
  $jobtitle->jobtitle_name = checkIndex($data, "jobtitle_name");
  $jobtitle->jobtitle_joblevel_id = checkIndex($data, "jobtitle_joblevel_id");
  $jobtitle->jobtitle_created = date("Y-m-d H:i:s");
  $jobtitle->jobtitle_datetime = date("Y-m-d H:i:s");
  checkId($jobtitle->jobtitle_aid);

//checks current data to avoid same entries from being updated
$jobtitle_name_old = checkIndex($data, 'jobtitle_name_old');
compareName($jobtitle, $jobtitle_name_old, $jobtitle->jobtitle_name);
checkId($jobtitle->jobtitle_aid);

  // update
  $query = checkUpdate($jobtitle);
  returnSuccess($jobtitle, "jobtitle", $query);
}

// return 404 error if endpoint not available
checkEndpoint();