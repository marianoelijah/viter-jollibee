<?php
// check database connection
$conn = null;
$conn = checkDbConnection();
// make instance of classes
$children = new Children($conn);
// get should not be present

// check data
checkPayload($data);
// get data
$children->children_is_active = 1;
$children->children_name = checkIndex($data, "children_name");
$children->children_email = checkIndex($data, "children_email");
$children->children_address = checkIndex($data, "children_address");
$children->children_created = date("Y-m-d H:i:s");
$children->children_datetime = date("Y-m-d H:i:s");

//checks newly added data if it already exists
isNameExist($children, $children->children_name);

$query = checkCreate($children);

returnSuccess($children, "children", $query);
