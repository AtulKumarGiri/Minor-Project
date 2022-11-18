<?php
//$conn = mysqli_connect("sql302.epizy.com", "epiz_30514950", "LYBnFW3UacatKl", "epiz_30514950_tihcollegespace");
$conn = mysqli_connect("sql103.epizy.com", "epiz_30798259", "0fc8viOKUIdn", "epiz_30798259_tihcollegespace");
$name=$_POST['name'];
$email_id=$_POST['email'];
$message=$_POST['message'];

$query="INSERT INTO `message` (`Name`,`email`,`message`) VALUES('$name','$email_id','$message')";
$r=mysqli_query($conn,$query);

//sending confirmation mail

$conn = mysqli_connect("sql302.epizy.com","epiz_30514950","LYBnFW3UacatKl","epiz_30514950_tihcollegespace");

include "registration/smtp/class.phpmailer.php"; // include the class file name
    //$email = "mailforrahul01@gmail.com";
if(isset($_POST['submit'])) {
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
$mail->Subject = "Hello ".$_POST['name'].","; //Subject od your mail
$mail->AddAddress($_POST['email'], ""); //To address who will receive this email
$mail->MsgHTML("<b>Thank you for contacting us, your message has been submitted successfully.Our team will response you via mail within 24 hours.<br/><br/>by <a href='http://tihcollegespace.epizy.com'>tihcollegespace</a></b>"); //Put your body of the message you can place html code here
//$mail->AddAttachment("images/asif18-logo.png"); //Attach a file here if any or comment this line,
$send = $mail->Send(); //Send the mails
if($send){
    echo '<center><h3 style="color:#009933;">Mail sent successfully</h3></center>';
}
else{
    echo '<center><h3 style="color:#FF3300;">Mail error: </h3></center>'.$mail->ErrorInfo;
}
}
if($r==1)
{
    echo ' <script type="text/javascript">
    alert("Messsage Sent Successfully!! :)");
    location="index.html";
    </script>'; 
}
else
{
    echo ' <script type="text/javascript">
    alert("Messsage Sent failed :( ");
    location="index.html";
    </script>'; 
}
?>