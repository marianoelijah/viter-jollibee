<?php
// set http header
require '../../core/header.php';
// use needed functions
require '../../core/functions.php';
require 'functions.php';
// use needed classes
require '../../models/advertisement/Advertisement.php';


// check database connection
$conn = null;
$conn = checkDbConnection();
// make instance of classes
$advertisement = new Advertisement($conn);
$response = new Response();

$body = file_get_contents("php://input");
$data = json_decode($body, true);

// validate api key
if (isset($_SERVER['HTTP_AUTHORIZATION'])) {
    checkApiKey();
    checkPayload($data);


    $advertisement->ads_search = $data['searchValue'];

    http_response_code(200);

    if ($data['isFilter']) {
        $advertisement->ads_is_active = checkIndex($data, 'statusFilter');

        if ($advertisement->ads_search != '') {
            $query = checkFilterActiveSearch($advertisement);
            getQueriedData($query);
        }
        $query = checkFilterActive($advertisement);
        getQueriedData($query);
    }

    $query = checkSearch($advertisement);
    getQueriedData($query);


    // return 404 error if endpoint not available
    checkEndpoint();
}

http_response_code(200);
// when authentication is cancelled
// header('HTTP/1.0 401 Unauthorized');
checkAccess();