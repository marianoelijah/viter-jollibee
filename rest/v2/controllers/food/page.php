<?php
// set http header
require '../../core/header.php';
// use needed functions
require '../../core/functions.php';
// require 'functions.php';
// use needed classes
require '../../models/food/Food.php';


// check database connection
$conn = null;
$conn = checkDbConnection();
// make instance of classes
$food = new Food($conn);
$response = new Response();
// validate api key
if (isset($_SERVER['HTTP_AUTHORIZATION'])) {
    checkApiKey();

    if (array_key_exists("start", $_GET)) {
        // get data
        // get task id from query string
        $food->food_start = $_GET['start'];
        $food->food_total = 4;
        //check to see if task id in query string is not empty and is number, if not return json error
        checkLimitId($food->food_start, $food->food_total);

        $query = checkReadLimit($food);
        $total_result = checkReadAll($food);
        http_response_code(200);
        checkReadQuery(
            $query,
            $total_result,
            $food->food_total,
            $food->food_start
        );
    }
    // return 404 error if endpoint not available
    checkEndpoint();
}

http_response_code(200);
// when authentication is cancelled
// header('HTTP/1.0 401 Unauthorized');
checkAccess();