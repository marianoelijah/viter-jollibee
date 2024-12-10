<?php
// check database connection
$conn = null;
$conn = checkDbConnection();
// make instance of classes
$company = new Company($conn);
// get should not be present

// check data
checkPayload($data);
// get data
$company->company_is_active = 1;
$company->company_name = checkIndex($data, "company_name");


//checks newly added data if it already exists
isNameExist($company, $company->company_name);

$query = checkCreate($company);

returnSuccess($company, "company", $query);
