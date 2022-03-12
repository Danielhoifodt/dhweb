<?php require_once "inc/html-top.inc.php";?>



<div class="text_wrapper">
<h1 class="page-heading">Kontakt meg</h1>
Send en en beskjed om det er noe du lurer på:)
<div style="display:grid;width:100%;">
<form class="mail" action="kontakt.php" method="POST">
    <input type="text" name="name" placeholder="Ditt navn">
    <input type="text" name="email" placeholder="Din epost">
    <input type="text" name="heading" placeholder="Tittel">
    <textarea name="content" style="height:90px;" placeholder="Din beskjed..."></textarea>
    <input type="submit" value="Send">
</form>
</div>
<br>
Eller:
<br><br>
<a title="facebook" target='_blank' href="https://www.facebook.com/daniel.hoifodt"><i class="fab fa-facebook fa-3x"></i></a>
&nbsp;&nbsp;&nbsp;
<a title="epost" target='_blank' href="mailto:danielhoifodt@hotmail.com"><i class="fas fa-envelope fa-3x"></i></a>
&nbsp;&nbsp;&nbsp;
<a title="Github" target='_blank' href="https://github.com/Danielhoifodt"><i class="fab fa-github fa-3x"></i></a>
<br><br><br>    
</div>
</div>
</div>

<?php

require './vendor/phpmailer/phpmailer/src/Exception.php';
require './vendor/phpmailer/phpmailer/src/PHPMailer.php';
require './vendor/phpmailer/phpmailer/src/SMTP.php';

// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// Load Composer's autoloader
require 'vendor/autoload.php';

// Instantiation and passing `true` enables exceptions
$mail = new PHPMailer(true);
try {
//Server settings
//$mail->SMTPDebug = SMTP::DEBUG_SERVER;                      // Enable verbose debug output
$mail->isSMTP();                                            // Send using SMTP
$mail->Host       = 'smtp-mail.outlook.com';              // Set the SMTP server to send through
$mail->SMTPAuth   = true;                                   // Enable SMTP authentication
$mail->Username   = 'danielhoifodt@hotmail.com';                     // SMTP username
$mail->Password   = getenv("MAILPASS");                               // SMTP password
$mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;      // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
$mail->Port       = 587;
                                  // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

//Recipients
if(isset($_POST["email"]))
$mail->setFrom("danielhoifodt@hotmail.com", "Fra hjemmeside. Navn: ".$_POST["name"]." Epost: ". $_POST["email"]);
    


$mail->addAddress("danielhoifodt@hotmail.com");

//     // Add a recipient
//$mail->addAddress('ellen@example.com');               // Name is optional
//$mail->addReplyTo('info@example.com', 'Information');
//$mail->addCC('cc@example.com');
//$mail->addBCC('bcc@example.com');

// Attachments
//$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
//$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

// Content
$mail->isHTML(true);
if(isset($_POST["heading"]))
{
    $mail->Subject = $_POST["heading"];  
}                                  // Set email format to HTML
if(isset($_POST["content"]))
{
    $mail->Body = $_POST["content"];
}


    $mail->send();
    echo 'Beskjed ble sendt';
} catch (Exception $e) {
    echo "Beskjed kunne ikke bli sendt: {$mail->ErrorInfo}";
    echo "";
}

?>
<?php require_once "inc/html-bottom.inc.php";?>
