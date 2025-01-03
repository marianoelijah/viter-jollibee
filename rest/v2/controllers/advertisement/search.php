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

    $advertisement->advertisement_search = $data['searchValue'];
    http_response_code(200);
    if($data['isFilter']) {
        $advertisement->advertisement_is_active = checkIndex($data, 'statusFilter');
        if($advertisement->advertisement_search != '') {
            $query = checkFilterActiveSearch($advertisement);
            getQueriedData($query);
        }
        $query = checkFilterActive($advertisement);
        getQueriedData($query);
    }

    $query = checkSearch($advertisement);
    http_response_code(200);
    getQueriedData($query);

    checkEndpoint();
}


http_response_code(200);
// when authentication is cancelled
// header('HTTP/1.0 401 Unauthorized');
checkAccess();