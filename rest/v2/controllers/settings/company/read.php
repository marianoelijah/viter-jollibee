<?php
// check database connection
$conn = null;
$conn = checkDbConnection();
// make instance of classes
$company = new Company($conn);
// get $_GET data
$error = [];
$returnData = [];

if (array_key_exists("companyid", $_GET)) {
  $company->company_aid = $_GET['companyid'];
  checkId($company->company_aid);
  $query = checkReadById($company);
  http_response_code(200);
  getQueriedData($query);
}

if (empty($_GET)) {
  $query = checkReadAll($company);
  http_response_code(200);
  getQueriedData($query);
}

// return 404 error if endpoint not available
checkEndpoint();