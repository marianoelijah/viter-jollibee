<?php
// set http header
require '../../core/header.php';
// use needed functions
require '../../core/functions.php';
// require 'functions.php';
// use needed classes
require '../../models/advertisement/Advertisement.php';


// check database connection
$conn = null;
$conn = checkDbConnection();
// make instance of classes
$advertisement = new Advertisement($conn);
$response = new Response();
// validate api key
if (isset($_SERVER['HTTP_AUTHORIZATION'])) {
    checkApiKey();

    if (array_key_exists("start", $_GET)) {
        // get data
        // get task id from query string
        $advertisement->advertisement_start = $_GET['start'];
        $advertisement->advertisement_total = 3;
        //check to see if task id in query string is not empty and is number, if not return json error
        checkLimitId($advertisement->advertisement_start, $advertisement->advertisement_total);

        $total_result = checkReadAll($advertisement);
        $query = checkReadLimit($advertisement);
        http_response_code(200);
        checkReadQuery(
            $query,
            $total_result,
            $advertisement->advertisement_total,
            $advertisement->advertisement_start
        );
    }
    // return 404 error if endpoint not available
    checkEndpoint();
}

http_response_code(200);
// when authentication is cancelled
// header('HTTP/1.0 401 Unauthorized');
checkAccess();