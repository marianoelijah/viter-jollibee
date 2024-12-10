<?php
// set http header
require '../../../../core/header.php';
// use needed functions
require '../../../../core/functions.php';
// require 'functions.php';
// use needed classes
require '../../../../models/settings/users/other/Other.php';


// check database connection
$conn = null;
$conn = checkDbConnection();
// make instance of classes
$other = new Other($conn);
$response = new Response();
// validate api key
if (isset($_SERVER['HTTP_AUTHORIZATION'])) {
    checkApiKey();

    if (array_key_exists("start", $_GET)) {
        // get data
        // get task id from query string
        $other->other_start = $_GET['start'];
        $other->other_total = 11;
        //check to see if task id in query string is not empty and is number, if not return json error
        checkLimitId($other->other_start, $other->other_total);

        $query = checkReadLimit($other);
        $total_result = checkReadAll($other);
        http_response_code(200);
        checkReadQuery(
            $query,
            $total_result,
            $other->other_total,
            $other->other_start
        );
    }
    // return 404 error if endpoint not available
    checkEndpoint();
}

http_response_code(200);
// when authentication is cancelled
// header('HTTP/1.0 401 Unauthorized');
checkAccess();