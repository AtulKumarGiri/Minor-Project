<?php
if(isset($_POST['reset'])){
    $password=$_SESSION['user']['password'];
    $cp=$_POST['cp'];
    $np=$_POST['np'];
    $rnp=$_POST['rnp'];
    include 'connection.php';
    $email=$_SESSION['user']['email'];
    if($password!=$cp){
        echo '<script>alert("Wrong Password Entered");</script>';
    }
    elseif($password==$cp&&$password==$rnp){
        echo '<script>alert("Current and New Password can\'t be same");</script>';
    }
    elseif($np!=$rnp){
        echo '<script>alert("Password does not Matched");</script>';
    }
    else
    if(($password==$cp)&&($np==$rnp)){
        
        $q1="update teacher set password='$np' where email='$email'";
        $q2="update login set password='$np' where email='$email'";
        mysqli_query($conn,$q1);
        mysqli_query($conn,$q2);
        echo '<script>alert("Password Changed");</script>';
        include "../../registration/smtp/class.phpmailer.php";
        $mail = new PHPMailer; // call the class
    //$mail->SMTPDebug = 3;
    $mail->IsSMTP();
    $mail->Host = "smtp.gmail.com"; //Hostname of the mail server
    $mail->Port = 587; //Port of the SMTP like to be 25, 80, 465 or 587
    $mail->SMTPAuth = true; //Whether to use SMTP authentication
    $mail->SMTPSecure = 'tls';
    $mail->Username = "tihcollegespace@gmail.com"; //Username for SMTP authentication any valid email created in your domain
    $mail->Password = "Rahul@2001"; //Password for SMTP authentication
    $mail->AddReplyTo("tihcollegespace@gmail.com", "TIH College Space"); //reply-to address
    $mail->SetFrom("tihcollegespace@gmail.com", "TIH College Space"); //From address of the mail
    // put your while loop here like below,
    // put your while loop here like below,
$mail->Subject = "Hello ".$_SESSION['user']['firstname'].","; //Subject od your mail
$mail->AddAddress($email, ""); //To address who will receive this email
$mail->MsgHTML("<b>Your account password has been changed.<br/><br/>by <a href='http://collegespace.epizy.com'>tihcollegespace</a></b>"); //Put your body of the message you can place html code here
//$mail->AddAttachment("images/asif18-logo.png"); //Attach a file here if any or comment this line,
$send = $mail->Send(); //Send the mails
    }
    else
        echo '<script>alert("Please Match the Password");</script>';
}
header('location:Profile.php');

?>