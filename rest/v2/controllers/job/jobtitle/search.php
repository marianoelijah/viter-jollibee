<?php
// set http header
require '../../../core/header.php';
// use needed functions
require '../../../core/functions.php';
// require 'functions.php';
// use needed classes
require '../../../models/job/jobtitle/JobTitle.php';
// check database connection
require 'functions.php';
$conn = null;
$conn = checkDbConnection();
// make instance of classes
$jobtitle = new JobTitle($conn);
// get payload
$body = file_get_contents("php://input");
$data = json_decode($body, true);
// // validate api key
if (isset($_SERVER['HTTP_AUTHORIZATION'])) {
    checkApiKey();
    checkPayload($data);
    // get data
    $jobtitle->jobtitle_search = $data["searchValue"];

    // only if filtering
    if ($data["isFilter"]) {

        // only if search with filter
        if ($jobtitle->jobtitle_search != "") {

            $jobtitle->jobtitle_is_active = checkIndex($data, "jobtitle_is_active");
            $query = checkFilterByStatusAndSearch($jobtitle);
            http_response_code(200);
            getQueriedData($query);
        }

        // if filter only
        $jobtitle->jobtitle_is_active = checkIndex($data, "jobtitle_is_active");
        $query = checkFilterByStatus($jobtitle);
        http_response_code(200);
        getQueriedData($query);
    }

    $query = checkSearch($jobtitle);
    http_response_code(200);
    getQueriedData($query);
    // return 404 error if endpoint not available
    checkEndpoint();
}

http_response_code(200);
// when authentication is cancelled
// header('HTTP/1.0 401 Unauthorized');
checkAccess();