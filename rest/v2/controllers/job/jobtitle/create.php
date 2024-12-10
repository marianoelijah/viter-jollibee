<?php
// check database connection
$conn = null;
$conn = checkDbConnection();
// make instance of classes
$jobtitle = new JobTitle($conn);
// get should not be present

// check data
checkPayload($data);
// get data
$jobtitle->jobtitle_is_active = 1;
$jobtitle->jobtitle_name = checkIndex($data, "jobtitle_name");
$jobtitle->jobtitle_joblevel_id = checkIndex($data, "jobtitle_joblevel_id");
$jobtitle->jobtitle_created = date("Y-m-d H:i:s");
$jobtitle->jobtitle_datetime = date("Y-m-d H:i:s");

//checks newly added data if it already exists
isNameExist($jobtitle, $jobtitle->jobtitle_name);

$query = checkCreate($jobtitle);

returnSuccess($jobtitle, "jobtitle", $query);
