<?php
// check database connection
$conn = null;
$conn = checkDbConnection();
// make instance of classes
$category = new Category($conn);
// get $_GET data
$error = [];
$returnData = [];

if (array_key_exists("categoryid", $_GET)) {
  $category->category_aid = $_GET['categoryid'];
  checkId($category->category_aid);
  $query = checkReadById($category);
  http_response_code(200);
  getQueriedData($query);
}

if (empty($_GET)) {
  $query = checkReadAll($category);
  http_response_code(200);
  getQueriedData($query);
}

// return 404 error if endpoint not available
checkEndpoint();