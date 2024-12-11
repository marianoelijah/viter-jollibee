<?php
// check database connection
$conn = null;
$conn = checkDbConnection();
// make instance of classes
$food = new Food($conn);
// get $_GET data
$error = [];
$returnData = [];
if (array_key_exists("foodid", $_GET)) {
  // get data
  $food->food_aid = $_GET['foodid'];
  checkId($food->food_aid);
  

  $query = checkDelete($food);

  returnSuccess($food, "food", $query);
}

// return 404 error if endpoint not available
checkEndpoint();