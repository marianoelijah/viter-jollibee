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
  // get data
  $company->company_aid = $_GET['companyid'];
  checkId($company->company_aid);
  

  $query = checkDelete($company);

  returnSuccess($company, "Company", $query);
}

// return 404 error if endpoint not available
checkEndpoint();