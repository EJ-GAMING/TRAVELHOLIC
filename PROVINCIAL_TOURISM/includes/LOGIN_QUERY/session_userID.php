<?php
session_start();
include_once '../../../includes/DB/connection.php';
if (isset($_POST['change'])) {
    
    $email = mysqli_real_escape_string($conn, $_SESSION['email']);
    $user_id = mysqli_real_escape_string($conn, $_POST['user_ID']);
}else {
    exit();
}






//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require '../PHPmailer/Exception.php';
require '../PHPmailer/PHPMailer.php';
require '../PHPmailer/SMTP.php';

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'travelholicots@gmail.com';                     //SMTP username
    $mail->Password   = 'travelholic:ots@2k21';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom($email);
    $mail->addAddress($email);     //Add a recipient
  
    $code = substr(str_shuffle('1234567890qwertyuiopasdfghjklzxcvbnm'), 0,6);

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Account Reset';
    $mail->Body    = 'To Reset your Account Please Click here <a href="http://localhost/capstone/PROVINCIAL_TOURISM/change_pass.php?code='.$code.'">Click Here</a>';
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';



    $send_email = "SELECT * from tbl_provincial_tourism where email='$email' and user_id = '$user_id'";
    $result = mysqli_query($conn, $send_email);
    if (mysqli_num_rows($result) <= 0) {
       $_SESSION['status'] = "Message Failed to send
                                Invalid USER ID";
       header("location: ../../fp_uniqueID.php");
    }else {
        $update_code = mysqli_query($conn, "UPDATE tbl_provincial_tourism SET user_id = '$code' WHERE email = '$email' ");
        $mail->send();
        $_SESSION['status'] = "Message Successfully Send! Please check your email to change passsword";
        header("location: ../../index.php");
    }
   



} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}


?>