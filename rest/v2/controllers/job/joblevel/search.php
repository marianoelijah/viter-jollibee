<?php
// set http header
require '../../../core/header.php';
// use needed functions
require '../../../core/functions.php';
// require 'functions.php';
// use needed classes
require '../../../models/job/joblevel/JobLevel.php';
// check database connection
require 'functions.php';
$conn = null;
$conn = checkDbConnection();
// make instance of classes
$joblevel = new JobLevel($conn);
// get payload
$body = file_get_contents("php://input");
$data = json_decode($body, true);
// // validate api key
if (isset($_SERVER['HTTP_AUTHORIZATION'])) {
    checkApiKey();
    checkPayload($data);
    // get data
    $joblevel->joblevel_search = $data["searchValue"];

    // only if filtering
    if ($data["isFilter"]) {

        // only if search with filter
        if ($joblevel->joblevel_search != "") {

            $joblevel->joblevel_is_active = checkIndex($data, "joblevel_is_active");
            $query = checkFilterByStatusAndSearch($joblevel);
            http_response_code(200);
            getQueriedData($query);
        }

        // if filter only
        $joblevel->joblevel_is_active = checkIndex($data, "joblevel_is_active");
        $query = checkFilterByStatus($joblevel);
        http_response_code(200);
        getQueriedData($query);
    }

    $query = checkSearch($joblevel);
    http_response_code(200);
    getQueriedData($query);
    // return 404 error if endpoint not available
    checkEndpoint();
}

http_response_code(200);
// when authentication is cancelled
// header('HTTP/1.0 401 Unauthorized');
checkAccess();