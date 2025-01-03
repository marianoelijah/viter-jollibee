<?php
// set http header
require '../../../../../core/header.php';
// use needed functions
require '../../../../../core/functions.php';
// require 'functions.php';
// use needed classes
require '../../../../../models/developer/settings/user/developer/Developer.php';
// get payload
// check database connection
$conn = null;
$conn = checkDbConnection();
// make instance of classes
$role = new Role($conn);
// get payload
$body = file_get_contents("php://input");
$data = json_decode($body, true);
// // validate api key
if (isset($_SERVER['HTTP_AUTHORIZATION'])) {
    checkApiKey();
    checkPayload($data);
    // get data
    $role->role_search = $data["searchValue"];

    // // only if filtering
    // if ($data["isFilter"]) {

    //     // only if search with filter
    //     if ($role->role_search != "") {

    //         $role->role_is_active = checkIndex($data, "role_is_active");
    //         $query = checkSearchByStatus($role);
    //         http_response_code(200);
    //         getQueriedData($query);
    //     }

    //     // if filter only
    //     $role->role_is_active = checkIndex($data, "role_is_active");
    //     $query = checkFilterByStatus($role);
    //     http_response_code(200);
    //     getQueriedData($query);
    // }

    $query = checkSearch($role);
    http_response_code(200);
    getQueriedData($query);
    // return 404 error if endpoint not available
    checkEndpoint();
}

http_response_code(200);
// when authentication is cancelled
// header('HTTP/1.0 401 Unauthorized');
checkAccess();