<?php
session_start();

if($_SESSION['login'] && $_SESSION['teacher']){

include 'connection.php';
// extract($_POST);
$stream=$_POST['stream'];
if($stream==1)
    $stream="ALL";
else if($stream==2)
    $stream="BCA";
else if($stream==3)
    $stream="BBA";
else if($stream==4)
    $stream="MCA";
else if($stream==5)
    $stream="MSC";
$year=$_POST['year'];

$yearsql="select * from years where id='$year'";
$yearquery=mysqli_query($conn,$yearsql);
$yeardata=mysqli_fetch_assoc($yearquery);
$year=$yeardata['year'];

$title=$_POST['title'];
$message=$_POST['message'];


// echo $message;




// echo '<br>36';
$x=count(array_filter($_FILES['documentname']['name']));
// echo '<br>38 '.$x;
$filepath='';
// echo '<br>39';

if($message!='' || $x>0){
// echo '<br>43';

if($x>1){
    // echo '<br>46';
for($i=0;$i<$x;$i++){
    // echo '<br>48';
    $temp=$_FILES['documentname']['tmp_name'][$i];
    $url = "Updates/";
    $var=$_FILES['documentname']['name'][$i];
    $furl = $url.$var;
    $filepath=$filepath.$furl.',';
    move_uploaded_file($_FILES['documentname']['tmp_name'][$i],$furl);
    $temp='';
    // echo $temp.' '.$furl.' '.$filepath.'<br>';
}
// echo '<br>58';
}
// echo '<br>60';
$date=date("Y-m-d");
date_default_timezone_set("Asia/Kolkata");
$time=date("h:i:sa");


// echo $stream.' '.$year.' '.$title.' '.$message.' '.$path.' '.$document;

// $date=date("d-m-Y");
// $time=date("h:i a");

    $q="INSERT INTO `updates`(`stream`, `year`, `title`, `message`, `file`, `date`, `time`) VALUES ('$stream','$year','$title','$message','$filepath','$date','$time')";
    $query = mysqli_query($conn,$q);
    echo $q;
    if($query==1){
        







        ?>
        <script>
            alert('Updates Saved \n <?php echo $title;?>');
            // window.history.back();
        </script>
        <?php
    }
    else{
        ?>
        <script>
            alert('An Error Occured');
            // window.history.back();
        </script>

    <?php
    }
}
else{
    ?>
        <script>
            alert('Message or File can\'t be empty.');
            window.history.back();
        </script>

    <?php
}
// header('location:index.php');

?>
<?php
  }
else{
  header("location:../../index.html");
}
?>