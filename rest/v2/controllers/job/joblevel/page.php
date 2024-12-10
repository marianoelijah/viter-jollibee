<?php
// set http header
require '../../../core/header.php';
// use needed functions
require '../../../core/functions.php';
// require 'functions.php';
// use needed classes
require '../../../models/job/joblevel/JobLevel.php';


// check database connection
$conn = null;
$conn = checkDbConnection();
// make instance of classes
$joblevel = new JobLevel($conn);
$response = new Response();
// validate api key
if (isset($_SERVER['HTTP_AUTHORIZATION'])) {
    checkApiKey();

    if (array_key_exists("start", $_GET)) {
        // get data
        // get task id from query string
        $joblevel->joblevel_start = $_GET['start'];
        $joblevel->joblevel_total = 11;
        //check to see if task id in query string is not empty and is number, if not return json error
        checkLimitId($joblevel->joblevel_start, $joblevel->joblevel_total);

        $query = checkReadLimit($joblevel);
        $total_result = checkReadAll($joblevel);
        http_response_code(200);
        checkReadQuery(
            $query,
            $total_result,
            $joblevel->joblevel_total,
            $joblevel->joblevel_start
        );
    }
    // return 404 error if endpoint not available
    checkEndpoint();
}

http_response_code(200);
// when authentication is cancelled
// header('HTTP/1.0 401 Unauthorized');
checkAccess();
