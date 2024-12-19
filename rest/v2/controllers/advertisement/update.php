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
  $advertisement->ads_aid = $_GET['advertisementid'];
  $advertisement->ads_image = checkIndex($data, "ads_image");
  $advertisement->ads_title = checkIndex($data, "ads_title");
  $advertisement->ads_created = date("Y-m-d H:i:s");
  $advertisement->ads_datetime = date("Y-m-d H:i:s");
  checkId($advertisement->ads_aid);

//checks current data to avoid same entries from being updated
// $advertisement_title_old = checkIndex($data, 'advertisement_title_old');
// compareTitle($advertisement, $advertisement_title_old, $advertisement->advertisement_title);
// checkId($advertisement->advertisement_aid);

  // update
  $query = checkUpdate($advertisement);
  returnSuccess($advertisement, "advertisement", $query);
}

// return 404 error if endpoint not available
checkEndpoint();