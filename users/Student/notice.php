<?php
session_start();

if($_SESSION['login'] && $_SESSION['student']){


include 'connection.php';
$viewid=$_POST['userid'];
$query = "SELECT * FROM updates WHERE id='$viewid'";
$result = mysqli_query($conn,$query);
$row = mysqli_fetch_assoc($result);
$originalDate = $row['date'];
$newDate = date("d-m-Y", strtotime($originalDate));
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
    button{
        cursor : pointer ;
        width: 100%;
    }
    
    .action{
        z-index: 99;
    }
   
    </style>
</head>
<body>
<!--<div class="sc-heading">
      <div class="sc-heading-part">
        <button type="button" class="btn btn-success btn-lg btn-block" id="updates-list" >Updates</button>
      </div>
      <div class="sc-heading-part">
        <button type="button" class="btn btn-success btn-lg btn-block" id="updates-new" >New Update</button>
      </div>
</div>
<div class="notice border-0 rounded-3">
<div class="notice-title">
        <strong><?php echo $row['title'];?></strong>
    </div>
    <div class="notice-date">
        Date : <?php echo $newDate;?>
    </div>
    <div class="notice-message">
        <?php echo $row['message'];?>
    </div>
    <div class="notice-docs">
        <a href="Updates/<?php echo $row['file'];?>" class="btn text-white  target="_blank">View</a>
    </div>
</div>-->

    <div class="card my-3 d-flex justify-content-center ">
        <div class="card-body mt-1 ">
            <div class="card-header text-center text-success py-2">
                <strong><?php echo $row['title']; ?></strong>
            </div>
            <div class="card   text-center text-dark py-2 m-auto">
              <?php $originalDate = $row['date'];
                $newDate = date("d-m-Y", strtotime($originalDate)); echo $newDate; ?>
            </div>
             <p class="card-text text-success py-2">
             <?php 
             if($row['message']==''){
                 echo 'Please go through these attached files given below';
             }
             echo $row['message'];?>
             </p>
      
            
            <?php
            if($row['file']==''||$row['file']==NULL){
            ?>
        <?php
            }
            else{
                $array=explode(",",$row['file']);
        ?>
        <tr>
            <div class="study-material">
                <?php
                $i=0;
                    foreach($array as $file){
                        $i=$i+1;
                        if($file=='')
                        {
                            break;
                        }
                ?>
                <div class="study-material-note">
                <a href="<?php 

                echo $file;

                ?>" target="_blank" download>
                <button class="btn btn-outline-success" >
                    <?php 
                        $filename=explode("/",$file);
                        foreach($filename as $notes){
                            if($notes=='')
                            {
                                break;
                            }
                            else
                                $seenote=$notes;
                        }
                        echo $seenote; 
                    ?>
                </button>
            </a>
            </div>
            <?php
                    }
                    ?>
                </div>
            </td>
        </tr>
        <?php
            }
        ?>
        </div>
    </div>       
</div>
<script>
    // $(document).ready(function(){
    //     $(document).on('click','tr[data-role=view]',function(){
    //         // alert($(this).data('id'));
    //         var dataid=$(this).data('id');
    //         $.post('notificationview.php',{
    //         viewid : dataid },
    //         function(data,status){
    //             $('#change-updates').html(data);
    //         })
    //     });
    //     $(document).on('click','div[data-role=view]',function(){
    //         // alert($(this).data('id'));
    //         var dataid=$(this).data('id');
    //         $.post('notificationview.php',{
    //         viewid : dataid },
    //         function(data,status){
    //             $('#change-updates').html(data);
    //         })
    //     });
    // });
</script>
<?php
  }
else{
//   header("location:../../index.html");
}
?>
</body>
</html>