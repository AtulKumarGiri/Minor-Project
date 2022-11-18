<?php
session_start();

if($_SESSION['login'] && $_SESSION['student']){

include 'connection.php';
$viewid=$_POST['viewid'];
$query = "SELECT * FROM updates WHERE id='$viewid'";
$result = mysqli_query($conn,$query);
$row = mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .notice{
            /* border:2px solid red; */
            margin:auto;
            margin-top:30px;
            display:flex;
            justify-content:center;
            align-items:center;
            flex-direction:column; 
            width:50%;
        }
        .notice h2{
            /* text-decoration-line: underline; */
            /* text-decoration-style: double; */
        }
        .notice p{
            margin-top:20px;
            /* text-align:center; */
        }
        /* .notice  */
        @media only screen and (max-width: 800px) {
            .notice{
                width:50%;
            }
        }
        @media only screen and (max-width: 400px) {
            .notice{
                width:90%;
            }
        }
        .title{
            cursor: pointer;
        }
        .title:hover{
            transform:scale(1.1);
        }
    </style>
</head>
<body>
 <div class="title" style="width:150px; margin-left:20px;"><h3 data-role="updates" onclick="reloadpage();"><Strong>Go Back</Strong></h3></div>
  <!--   <div class="notice">
      <h2><?php echo $row['title']; ?></h2>
        <?php if($row['message']!=''){?>
        <p><?php echo $row['message']; ?></p>
        <?php } ?>
        <?php if($row['file']!=''){?>
        <p><a href="<?php echo '../Teacher/'.$row['file']; ?>" target="_blank"><button class="btn btn-success">Attached File</button></a></p>
        <?php } ?>
    </div>
     -->  
    <div class="notice"> 
    <div class="card my-3 d-flex justify-content-center ">
        <div class="card-body ">
            <div class="card-header text-center text-success py-2">
                <h2><?php echo $row['title']; ?></h2>
            </div>
            <div class="card text-center text-dark py-2 m-auto">
              <?php $originalDate = $row['date'];
                $newDate = date("d-m-Y", strtotime($originalDate)); echo $newDate; ?>
            </div>
             <p class="card-text text-center text-success py-2">
             <?php 
             if($row['message']==''){
                 echo 'Please go through these attached files given below';
             }
                echo $row['message'];
             ?>
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

                echo '../Teacher/'.$file;

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
      $(document).ready(function(){
          $(document).on('click','h2[data-role=updates]',function(){
              // alert($(this).data('id'));
              $.post('updates_list.php',
              function(data,status){
                  $('#student_updates').html(data);
                })
            });
        });
        function reloadpage(){
            location.reload();
          }
        </script>
        <?php
  }
else{
  header("location:../../index.html");
}
?>
</body>
</html>