<?php
// check database connection
$conn = null;
$conn = checkDbConnection();
// make instance of classes
$other = new Other($conn);
// get should not be present

// check data
checkPayload($data);
// get data
$other->other_is_active = 1;
$other->other_name = checkIndex($data, "other_name");
$other->other_email = checkIndex($data, "other_email");
$other->other_role_id = checkIndex($data, "other_role_id");
$other->other_created = date("Y-m-d H:i:s");
$other->other_datetime = date("Y-m-d H:i:s");

//checks newly added data if it already exists
isNameExist($other, $other->other_email);


$query = checkCreate($other);

returnSuccess($other, "other", $query);
