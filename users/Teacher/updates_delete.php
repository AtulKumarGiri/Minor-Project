<?php
session_start();

if($_SESSION['login'] && $_SESSION['teacher']){

include 'connection.php';
$viewid=$_GET['viewid'];
$a="delete from updates where id='$viewid'";
$b=mysqli_query($conn,$a);
if($b==1){
    ?>
        <script>
            alert('Update Deleted..');
            window.history.back();
        </script>
    <?php
}
else{
    ?>
        <script>
            alert('Error..');
            window.history.back();
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