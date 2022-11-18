<?php
session_start();

if($_SESSION['login'] && $_SESSION['teacher']){

include 'connection.php';
$viewid=$_POST['viewid'];
$a="delete from schedule_class where id='$viewid'";
$b=mysqli_query($conn,$a);
if($b==1){
    ?>
        <script>
            alert('Class Deleted..');
            // header('location:')
        </script>
    <?php
}
else{
    ?>
        <script>
            alert('Error..');
            // location.reload();
        </script>
    <?php
}
?>
<?php
  }
else{
  header("location:../../index.html");
}
?>