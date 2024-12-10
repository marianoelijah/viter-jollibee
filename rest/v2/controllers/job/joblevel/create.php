<?php
// check database connection
$conn = null;
$conn = checkDbConnection();
// make instance of classes
$joblevel = new JobLevel($conn);
// get should not be present

// check data
checkPayload($data);
// get data
$joblevel->joblevel_is_active = 1;
$joblevel->joblevel_name = checkIndex($data, "joblevel_name");
$joblevel->joblevel_created = date("Y-m-d H:i:s");
$joblevel->joblevel_datetime = date("Y-m-d H:i:s");

//checks newly added data if it already exists
isNameExist($joblevel, $joblevel->joblevel_name);

$query = checkCreate($joblevel);

returnSuccess($joblevel, "joblevel", $query);
