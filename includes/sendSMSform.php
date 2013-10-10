<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Send SMS form</title>
</head>

<body>

<form id="form1" name="form1" method="post" action="<?php $_SERVER['PHP_SELF'] ?>">
  <table width="500" border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td height="25" align="left" valign="middle">Username:</td>
      <td align="left" valign="middle"><input name="username" type="text" id="username" /></td>
    </tr>
    <tr>
      <td height="25" align="left" valign="middle">Password:</td>
      <td align="left" valign="middle"><input name="password" type="text" id="password" /></td>
    </tr>
    <tr>
      <td width="114" height="25" align="left" valign="middle">GSM number: </td>
      <td width="386" align="left" valign="middle"><input name="gsm" type="text" id="gsm" /></td>
    </tr>
    <tr>
      <td height="25" align="left" valign="middle">Sender:</td>
      <td align="left" valign="middle"><input name="sender" type="text" id="sender" /></td>
    </tr>
    <tr>
      <td height="25" align="left" valign="middle">Message type: </td>
      <td align="left" valign="middle"><input name="messagetype" type="radio" value="longSMS" checked="checked" />
      Text message<br />
      <input name="messagetype" type="radio" value="bookmark" /> 
      Wap push </td>
    </tr>
    <tr>
      <td height="25" align="left" valign="middle">WAP URL: </td>
      <td align="left" valign="middle"><input name="bookmark" type="text" id="bookmark" /></td>
    </tr>
    <tr>
      <td height="25" align="left" valign="middle">Is Flash: </td>
      <td align="left" valign="middle"><input name="isflash" type="checkbox" id="isflash" value="1" /></td>
    </tr>
    <tr>
      <td align="left" valign="top">Message Text: </td>
      <td align="left" valign="top"><textarea name="messagetext" id="messagetext"></textarea></td>
    </tr>
    <tr>
      <td height="30" align="left" valign="middle"><input name="submit" type="submit" id="submit" value="Send" /></td>
      <td align="left" valign="middle">&nbsp;</td>
    </tr>
  </table>
</form>

<?php

if (isset($_POST['submit']) and $_POST['submit'] == "Send")
{
	require_once('sendSMSclass.php');
	
	$gsm = array(); //gsm numbers must be in the array
	$gsm[0] = $_POST['gsm']; //sample

	$username 		= $_POST['username'];    	//your username
	$password 		= $_POST['password'];    	//your password
	$sender 		= $_POST['sender'];
	$isflash 		= $_POST['isflash'];      	//Is flash message (1 or 0)
	$type			= $_POST['messagetype'];	//msg type ("bookmark" - for wap push, "longSMS" for text messages only)
	$bookmark 		= $_POST['bookmark'];		//wap url (example: www.google.com)
	$messagetext 	        = $_POST['messagetext'];

if (empty($isflash))
$isflash=0;

	$SENDSMS = new SendSMSclass();

	$response = $SENDSMS->SendSMS($username,$password,$sender,$messagetext,$isflash, $gsm, $type, $bookmark);
	
	echo htmlentities($response, ENT_QUOTES);
}
?>
</body>
</html>


