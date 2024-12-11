<?php
// check database connection
$conn = null;
$conn = checkDbConnection();
// make instance of classes
$category = new Category($conn);
// get should not be present

// check data
checkPayload($data);
// get data
$category->category_is_active = 1;
$category->category_image = checkIndex($data, "category_image");
$category->category_title = checkIndex($data, "category_title");
$category->category_created = date("Y-m-d H:i:s");
$category->category_datetime = date("Y-m-d H:i:s");

//checks newly added data if it already exists
// isNameExist($category, $category->category_email);


$query = checkCreate($category);

returnSuccess($category, "category", $query);
