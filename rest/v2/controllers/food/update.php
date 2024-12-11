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
  // check data
  checkPayload($data);
  // get data
  $food->food_aid = $_GET['foodid'];
  $food->food_name = checkIndex($data, "food_name");
  $food->food_price = checkIndex($data, "food_price");
  $food->food_category_id = checkIndex($data, "food_category_id");

  $food->food_created = date("Y-m-d H:i:s");
  $food->food_datetime = date("Y-m-d H:i:s");
  checkId($food->food_aid);

//checks current data to avoid same entries from being updated
$food_name_old = checkIndex($data, 'food_name_old');
compareName($food, $food_name_old, $food->food_name);
checkId($food->food_aid);

  // update
  $query = checkUpdate($food);
  returnSuccess($food, "food", $query);
}

// return 404 error if endpoint not available
checkEndpoint();