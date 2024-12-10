<?php
// check database connection
$conn = null;
$conn = checkDbConnection();
// make instance of classes
$food = new Food($conn);
// get should not be present

// check data
checkPayload($data);
// get data
$food->food_is_active = 1;
$food->food_title = checkIndex($data, "food_title");
$food->food_created = date("Y-m-d H:i:s");
$food->food_datetime = date("Y-m-d H:i:s");

//checks newly added data if it already exists
// isNameExist($food, $food->food_email);


$query = checkCreate($food);

returnSuccess($food, "food", $query);
