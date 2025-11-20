<?php
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function

require ('./content/mails/PHPMailer-master/src/Exception.php');
require ('./content/mails/PHPMailer-master/src/PHPMailer.php');
require ('./content/mails/PHPMailer-master/src/SMTP.php');
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;


//Load Composer's autoloader (created by composer, not included with PHPMailer)
// require 'vendor/autoload.php';

//Create an instance; passing `true` enables exceptions


function sendMail($products, $price, $nickname, $email, $address, $date)
{
    $mail = new PHPMailer(true);
    try {
        //Server settings
        $mail->SMTPDebug = SMTP::DEBUG_OFF;                      //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = 'heladoexpressdwes@gmail.com';                     //SMTP username
        $mail->Password   = 'rvqg lqlr ptfo rakw';                               //SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
        $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

        //Recipients
        $mail->setFrom('heladoexpressdwes@gmail.com', 'Mailer');
        $mail->addAddress($email, $nickname);     //Add a recipient
        // $mail->addAddress('ellen@example.com');               //Name is optional
        // $mail->addReplyTo('info@example.com', 'Information');
        // $mail->addCC('cc@example.com');
        // $mail->addBCC('bcc@example.com');

        //Attachments
        // $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
        // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = 'You Purchase from Helado Express';
        $mail->Body    = 'Dear ' . ucfirst($nickname) . '. <br>Your order from <b>' . $date .'</b> has been processed.<br><b>' . $products. '</b><br>'. 'Total price: <b>'. $price . '</b><br>Your order will be delivered to this address: <b>' . $address . '</b><br>Thank you for choosing Helado Express!';
        // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

        $mail->send();
        // echo 'Message has been sent';
    } catch (Exception $e) {
        // echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}
