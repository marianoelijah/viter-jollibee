<?php
// set http header
require '../../../../core/header.php';
// use needed functions
require '../../../../core/functions.php';
// require 'functions.php';
// use needed classes
require '../../../../models/settings/users/role/Role.php';


// check database connection
$conn = null;
$conn = checkDbConnection();
// make instance of classes
$role = new Role($conn);
$response = new Response();
// validate api key
if (isset($_SERVER['HTTP_AUTHORIZATION'])) {
    checkApiKey();

    if (array_key_exists("start", $_GET)) {
        // get data
        // get task id from query string
        $role->role_start = $_GET['start'];
        $role->role_total = 11;
        //check to see if task id in query string is not empty and is number, if not return json error
        checkLimitId($role->role_start, $role->role_total);

        $query = checkReadLimit($role);
        $total_result = checkReadAll($role);
        http_response_code(200);
        checkReadQuery(
            $query,
            $total_result,
            $role->role_total,
            $role->role_start
        );
    }
    // return 404 error if endpoint not available
    checkEndpoint();
}

http_response_code(200);
// when authentication is cancelled
// header('HTTP/1.0 401 Unauthorized');
checkAccess();