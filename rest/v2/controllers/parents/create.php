<?php
// check database connection
$conn = null;
$conn = checkDbConnection();
// make instance of classes
$parents = new Parents($conn);
// get should not be present

// check data
checkPayload($data);
// get data
$parents->parents_is_active = 1;
$parents->parents_name = checkIndex($data, "parents_name");
$parents->parents_email = checkIndex($data, "parents_email");
$parents->parents_address = checkIndex($data, "parents_address");
$parents->parents_created = date("Y-m-d H:i:s");
$parents->parents_datetime = date("Y-m-d H:i:s");

$query = checkCreate($parents);

returnSuccess($parents, "parents", $query);
