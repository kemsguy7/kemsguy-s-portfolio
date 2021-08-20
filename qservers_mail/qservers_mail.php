<?php

require_once "Mail.php"; // PEAR Mail package
require_once ('Mail/mime.php'); // PEAR Mail_Mime packge

 $name = $_POST['name']; // form field
 $email = $_POST['email']; // form field
 $message = $_POST['message']; // form field
 
 if ($_POST['submit']){



 $from = "myemail@mydomain.com"; //enter your email address
 $to = "john@myfriendsdomain.com"; //enter the email address of the contact your sending to
 $subject = "Contact Form"; // subject of your email

$headers = array ('From' => $from,'To' => $to, 'Subject' => $subject);

$text = ''; // text versions of email.
$html = "<html><body>Name: $name <br> Email: $email <br>Message: $message <br></body></html>"; // html versions of email.

$crlf = "\n";

$mime = new Mail_mime($crlf);
$mime->setTXTBody($text);
$mime->setHTMLBody($html);

//do not ever try to call these lines in reverse order
$body = $mime->get();
$headers = $mime->headers($headers);

 $host = "localhost"; // all scripts must use localhost
 $username = "myemail@mydomain.com"; //  your email address (same as webmail username)
 $password = "23ert5"; // your password (same as webmail password)

$smtp = Mail::factory('smtp', array ('host' => $host, 'auth' => true,
'username' => $username,'password' => $password));

$mail = $smtp->send($to, $headers, $body);

if (PEAR::isError($mail)) {
echo("<p>" . $mail->getMessage() . "</p>");
}
else {
echo("<p>Message successfully sent!</p>");
// header("Location: http://www.example.com/");
}
  }
 ?>
 
 <form action="qservers_mail.php" method="post">
<table border="0" style="background:#ececec" cellspacing="5">
<tr align="left"><td>Name</td><td><input type="text" size="30" name="name"></td></tr>
<tr align="left"><td>Email address</td><td><input type="text" size="30" name="email"></td></tr>
<tr align="left"><td valign="top">Comments</td><td><textarea name="message" rows="6" cols="30"></textarea></td></tr>
<tr align="left"><td>&nbsp;</td><td><input type="submit" value="Send" name='submit'><font face="arial" size="1">&nbsp;&nbsp;<a href="http://www.qservers.net">Qservers.net</a> by Netbuilder Ltd.</font></td></tr>
</table>
</form>
