<?php

// check database connection
$conn = null;
$conn = checkDbConnection();
// make instance of classes
$children = new Children($conn);
// get $_GET data
$error = [];
$returnData = [];
if (array_key_exists("childrenid", $_GET)) {
  // check data
  checkPayload($data);
  // get data
  $children->children_aid = $_GET['childrenid'];
  $children->children_name = checkIndex($data, "children_name");
  $children->children_email = checkIndex($data, "children_email");
  $children->children_address = checkIndex($data, "children_address");
  $children->children_created = date("Y-m-d H:i:s");
  $children->children_datetime = date("Y-m-d H:i:s");
  checkId($children->children_aid);

//checks current data to avoid same entries from being updated
$children_name_old = checkIndex($data, 'children_name_old');
compareName($children, $children_name_old, $children->children_name);
checkId($children->children_aid);

  // update
  $query = checkUpdate($children);
  returnSuccess($children, "children", $query);
}

// return 404 error if endpoint not available
checkEndpoint();