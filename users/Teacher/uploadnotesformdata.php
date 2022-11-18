<?php
include 'connection.php';
session_start();

if($_SESSION['login'] && $_SESSION['teacher']){


// $faculty_id=$_SESSION['login']['id'];
// $faculty_name=$_SESSION['login']['name'];
$faculty_id=$_SESSION['user']['unique_id'];
$firstname=$_SESSION['user']['firstname'];
$midname=$_SESSION['user']['midname'];
$lastname=$_SESSION['user']['lastname'];
$faculty_name=$firstname.' '.$midname.' '.$lastname;
$stream=$_POST['streamUN'];
if($stream==1)
    $stream="BCA";
else if($stream==2)
    $stream="BBA";
else if($stream==3)
    $stream="MCA";
else if($stream==4)
    $stream="MSC";
$sem=$_POST['semesterUN'];
     if($sem==1||$sem==7||$sem==13||$sem==17)
    $sem="SEM1";
else if($sem==2||$sem==8||$sem==14||$sem==18)
    $sem="SEM2";
else if($sem==3||$sem==9||$sem==15||$sem==19)
    $sem="SEM3";
else if($sem==4||$sem==10||$sem==16||$sem==20)
    $sem="SEM4";
else if($sem==5||$sem==11)
    $sem="SEM5";
else if($sem==6||$sem==12)
    $sem="SEM6";

$section=$_POST['sectionUN'];
$subject=$_POST['subjectUN'];

// code to extract subject by id
$q_subject="select * from subjects";
$query_subject=mysqli_query($conn,$q_subject);
while($result_subject=mysqli_fetch_array($query_subject)){
    if($result_subject['id']==$subject){
        $subject=$result_subject['subject'];
        break;
    }
}


$date=$_POST['dateUN'];
$topic=$_POST['topicUN'];
// $time=$_GET['timeUN'];
// $file=
$filepath='';
$x=count($_FILES['fileUN']['name']);
for($i=0;$i<$x;$i++){
    $temp=$_FILES['fileUN']['tmp_name'][$i];
    $url = "Notes/";
    $var=$_FILES['fileUN']['name'][$i];
    $furl = $url.$var;
    $filepath=$filepath.$furl.',';
    move_uploaded_file($_FILES['fileUN']['tmp_name'][$i],$furl);
    $temp='';
    echo $temp.' '.$furl.' '.$filepath.'<br>';
}
// $filename=$_FILES['fileUN']['name'];
$classlink=$_POST['classlinkUN'];



$q="INSERT INTO `upload_notes` (`faculty_id`, `faculty_name`, `stream`, `sem`, `section`, `subject`, `topic`, `date`, `file`, `recordinglink`) VALUES ('$faculty_id', '$faculty_name', '$stream', '$sem', '$section', '$subject', '$topic', '$date', '$filepath', '$classlink')";

$queryrun=mysqli_query( $conn, $q) or die("Error : ".mysqli_error($conn));
// $queryrun=$db->query($q);


if($queryrun==1){
    $msg_title='New Material: \"'.$title.'\"';
        $msg_body=$_SESSION['user']['firstname']." ".$_SESSION['user']['midname']." ".$_SESSION['user']['lastname']." posted a new study material on tihcollegespace.";
        // move_uploaded_file($_FILES['documentname']['tmp_name'],$furl);
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
    $q="select * from student where stream='$stream' and semester='$sem' and (section='$section' or section='Combined')";
    $results=mysqli_query($conn,$q);
    if(mysqli_num_rows($results)>0){
    while($row=mysqli_fetch_assoc($results)){
    $mail->Subject = $msg_title.",<br>"; //Subject od your mail
    $mail->AddAddress($row['email'], ""); //To address who will receive this email
    $mail->MsgHTML($msg_body."<br/>by <a href='http://tihcollegespace.epizy.com'>tihcollegespace</a></b>"); //Put your body of the message you can place html code here
    //$mail->AddAttachment("images/asif18-logo.png"); //Attach a file here if any or comment this line,
    $send = $mail->Send(); //Send the mails
    }
    }
    ?>
    
        <script>
            alert('Successfully Uploaded');
            window.history.back();
        </script>
    <?php
}
else{
    ?>
        <script>
            alert('Error Occured');
            window.history.back();
        </script>
    <?php
}
// header('location:index.php');
  }
else{
  header("location:../../index.html");
}
?>