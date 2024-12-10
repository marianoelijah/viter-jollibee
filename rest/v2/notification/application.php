<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';
require 'PHPMailer/Exception.php';

include_once("mail-config.php");
include_once("template/application-for-admin.php");
include_once("template/application-for-trainee.php");

function sendEmailAdmin($name, $email)
{
	$mail = new PHPMailer(true);
	$mail->isSMTP();
	$mail->Host = 'giow10.siteground.us'; // SiteGround
	$mail->Port = 465;
	$mail->SMTPSecure = "ssl";
	$mail->SMTPAuth = true;
	$mail->Username =  USERNAME; // if gmail use your gmail email
	$mail->Password = PASSWORD; // if gmail use your email password
	$mail->Subject = NEW_APPLICATION;
	$mail->setFrom(USERNAME, FROM);
	$mail->isHTML(true);
	$mail->Body = getHtmlEmailAdmin(
		$name,
		$email,
		ROOT_DOMAIN,
		IMAGES_URL
	);
	$mail->addAddress(ADMIN);

	if ($mail->Send()) {
		return "Success sending email.";
	} else {
		return "Failed sending email.";
	}
}

function sendEmailTrainee($firstname, $email)
{
	$mail = new PHPMailer(true);
	$mail->isSMTP();
	$mail->Host = 'giow10.siteground.us'; // SiteGround
	$mail->Port = 465;
	$mail->SMTPSecure = "ssl";
	$mail->SMTPAuth = true;
	$mail->Username =  USERNAME; // if gmail use your gmail email
	$mail->Password = PASSWORD; // if gmail use your email password
	$mail->Subject = ACKNOWLEDGEMENT;
	$mail->setFrom(USERNAME, FROM);
	$mail->isHTML(true);
	$mail->Body = getHtmlEmailTrainee($firstname, IMAGES_URL);
	$mail->addAddress($email);

	if ($mail->Send()) {
		return "Success sending email.";
	} else {
		return "Failed sending email.";
	}
}
