<?php
// check database connection
$conn = null;
$conn = checkDbConnection();
// make instance of classes
$advertisement = new Advertisement($conn);
// get should not be present

// check data
checkPayload($data);
// get data
$advertisement->ads_is_active = 1;
$advertisement->ads_image = checkIndex($data, "ads_image");
$advertisement->ads_title = checkIndex($data, "ads_title");
$advertisement->ads_created = date("Y-m-d H:i:s");
$advertisement->ads_datetime = date("Y-m-d H:i:s");

//checks newly added data if it already exists
// isNameExist($advertisement, $advertisement->ads_title);


$query = checkCreate($advertisement);

returnSuccess($advertisement, "advertisement", $query);