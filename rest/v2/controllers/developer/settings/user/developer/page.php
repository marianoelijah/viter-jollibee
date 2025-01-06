<?php
// set http header
require '../../../../../core/header.php';
// use needed functions
require '../../../../../core/functions.php';
// require 'functions.php';
// use needed classes
require '../../../../../models/developer/settings/user/developer/Developer.php';


// check database connection
$conn = null;
$conn = checkDbConnection();
// make instance of classes
$developer = new Developer($conn);
$response = new Response();
// validate api key
if (isset($_SERVER['HTTP_AUTHORIZATION'])) {
    checkApiKey();

    if (array_key_exists("start", $_GET)) {
        // get data
        // get task id from query string
        $developer->developer_start = $_GET['start'];
        $developer->developer_total = 11;
        //check to see if task id in query string is not empty and is number, if not return json error
        checkLimitId($developer->developer_start, $developer->developer_total);

        $query = checkReadLimit($developer);
        $total_result = checkReadAll($developer);
        http_response_code(200);
        checkReadQuery(
            $query,
            $total_result,
            $developer->developer_total,
            $developer->developer_start
        );
    }
    // return 404 error if endpoint not available
    checkEndpoint();
}

http_response_code(200);
// when authentication is cancelled
// header('HTTP/1.0 401 Unauthorized');
checkAccess();