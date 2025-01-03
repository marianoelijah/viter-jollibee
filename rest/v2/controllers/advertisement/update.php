<?php
// check database connection
$conn = null;
$conn = checkDbConnection();
// make instance of classes
$advertisement = new Advertisement($conn);
// get $_GET data
$error = [];
$returnData = [];
if (array_key_exists("advertisementid", $_GET)) {
  // check data
  checkPayload($data);
  // get data
  $advertisement->advertisement_aid = $_GET['advertisementid'];
  $advertisement->advertisement_image = checkIndex($data, "advertisement_image");
  $advertisement->advertisement_title = checkIndex($data, "advertisement_title");
  $advertisement->advertisement_created = date("Y-m-d H:i:s");
  $advertisement->advertisement_datetime = date("Y-m-d H:i:s");
  checkId($advertisement->advertisement_aid);

//checks current data to avoid same entries from being updated
// $advertisement_name_old = checkIndex($data, 'advertisement_name_old');
// compareName($advertisement, $advertisement_name_old, $advertisement->advertisement_name);
// checkId($advertisement->advertisement_aid);

  // update
  $query = checkUpdate($advertisement);
  returnSuccess($advertisement, "advertisement", $query);
}

// return 404 error if endpoint not available
checkEndpoint();