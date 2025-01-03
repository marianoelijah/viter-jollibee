<?php
// check database connection
$conn = null;
$conn = checkDbConnection();
// make instance of classes
$ads = new Ads($conn);
// get should not be present

// check data
checkPayload($data);
// get data
$ads->ads_is_active = 1;
$ads->ads_image = checkIndex($data, "ads_image");
$ads->ads_title = checkIndex($data, "ads_title");
$ads->ads_created = date("Y-m-d H:i:s");
$ads->ads_datetime = date("Y-m-d H:i:s");

//checks newly added data if it already exists
// isNameExist($ads, $ads->ads_title);


$query = checkCreate($ads);

returnSuccess($ads, "ads", $query);