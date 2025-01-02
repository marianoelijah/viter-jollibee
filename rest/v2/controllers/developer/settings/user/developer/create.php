<?php
// check database connection
$conn = null;
$conn = checkDbConnection();
// make instance of classes
$developer = new Developer($conn);
$encrypt = new Encryption();
// use notification email
require '../../../../../notification/verify-account.php'

// check data
checkPayload($data);
// get data
$developer->user_developer_is_active = 1;
$developer->user_developer_first_name = checkIndex($data, "user_developer_first_name");
$developer->user_developer_last_name = checkIndex($data, "user_developer_last_name");
$developer->user_developer_email = checkIndex($data, "user_developer_email");
$developer->user_developer_role_id = checkIndex($data, "user_developer_role_id");
$developer->user_developer_key = $encrypt->doHash(rand());
$developer->user_developer_created = date("Y-m-d H:i:s");
$developer->user_developer_datetime = date("Y-m-d H:i:s");

$password_link = '/developer/create-password';

//checks newly added data if it already exists
isEmailExist($developer, $developer->user_developer_email);

sendEmail(
    $password_link,
    $developer->user_developer_first_name,
    $developer->user_developer_email,
    $developer->user_developer_key,
);


$query = checkCreate($developer);
returnSuccess($developer, "developer", $query);