<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';
require 'PHPMailer/Exception.php';

include_once("mail-config.php");
include_once("template/reset-password.php");

function sendEmail($password_link, $email, $key,   $code)
{
	$mail = new PHPMailer(true);
	$mail->isSMTP();
	$mail->Host = 'giow10.siteground.us'; // SiteGround
	$mail->Port = 465;
	$mail->SMTPSecure = "ssl";
	$mail->SMTPAuth = true;
	$mail->Username =  USERNAME; // if gmail use your gmail email
	$mail->Password = PASSWORD; // if gmail use your email password
	$mail->Subject = RESET_PASSWORD;
	$mail->setFrom(USERNAME, FROM);
	$mail->isHTML(true);
	$mail->Body = getHtmlResetPassword(
		$password_link,
		$email,
		$key,
		$code,
		ROOT_DOMAIN,
		IMAGES_URL
	);
	$mail->addAddress($email);
	$mail->SMTPOptions = array(
		'ssl' => array(
		'verify_peer' => false,
		'verify_peer_name' => false,
		'allow_self_signed' => true
		)
		);

	if ($mail->Send()) {
		return "Success sending email.";
	} else {
		return "Failed sending email.";
	}
}
