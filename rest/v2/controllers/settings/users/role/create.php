<?php
// check database connection
$conn = null;
$conn = checkDbConnection();
// make instance of classes
$role = new Role($conn);
// get should not be present

// check data
checkPayload($data);
// get data
$role->role_is_active = 1;
$role->role_name = checkIndex($data, "role_name");
$role->role_description = checkIndex($data, "role_description");
$role->role_created = date("Y-m-d H:i:s");
$role->role_datetime = date("Y-m-d H:i:s");

//checks newly added data if it already exists
isNameExist($role, $role->role_name);

$query = checkCreate($role);
checkAddColumn($role, $role->role_name);
checkUpdateColumnValue($role, $role->role_name);

returnSuccess($role, "role", $query);