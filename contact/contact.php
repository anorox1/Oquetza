<?php
/*
Credits: Bit Repository
URL: http://www.bitrepository.com/
*/

include 'config.php';

error_reporting (E_ALL ^ E_NOTICE);

$post = (!empty($_POST)) ? true : false;

if($post)
{

$name = stripslashes($_POST['name']);
$email = trim($_POST['email']);
$subject = stripslashes($_POST['subject']);
$message = stripslashes($_POST['message']);

$message = (!empty($message)) ? $message : null;
$name = (!empty($name)) ? $name : null;
$subject = (!empty($subject)) ? $subject : null;
$email = "ubuntu@oquetza.mx";

$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
$headers .= 'From: <'.$email.'>' . "\r\n"; 

$html = '<html>
			<body>
				<table style="border: 1px solid #ccc; width: 50%;">
					<tr style="background: #f9f9f9;">
						<td><span style="padding-left: 15px; font-family: "Open Sans", Arial, sans-serif; color: #777; display:inline-block;"><b style="color: #377AC0;">C</b>OLEGIO <b style="color: #377AC0;">O</b>QUETZA</span></td>
						<td><img src="http://www.oquetza.mx/img/logo.png" width="50px" style="padding: 10px;" /></td>
					</tr>
					<tr>
						<td>
							<div style="padding: 10px 10px 10px 15px; font-family: "Open Sans", Arial, sans-serif;">
								<h3>Informaci&oacute;n del cliente: </h3>
								<p><b>Nombre:</b> '.$name.'</p>
								<p><b>Mail:</b> '.$email.'</p>
								<p>'.$message.'</p>
							</div>
						</td>
					</tr>
					<tr>
						<td colspan="2">
							<div style="width: 100%; height: 50px; background: #377AC0;"></div>
						</td>
					</tr>
				</table>
			</body>
		</html>';

if(!$error)
{
	$mail = mail(WEBMASTER_EMAIL, $subject, $html, $headers);


if($mail)
{
echo 'OK';
}

}


}
?>