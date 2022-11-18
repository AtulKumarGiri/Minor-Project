<?php
session_start();

if($_SESSION['login'] && $_SESSION['student']){

include 'connection.php';
$viewid=$_POST['viewid'];
$query = "SELECT * FROM schedule_class WHERE id='$viewid'";
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
        .table{
            width: 400px;
            margin:auto;
            margin-top:5px;
        }
        
        .SC-form-container{
            display:flex;
            flex-direction:column;
            /* justify-content:center;
            align-items:center; */
        }
        .sc-action button{ 
            float: right;
            margin:10px;
        }
        .class-details{
            margin:auto;
            margin-top: 10px;
            margin-bottom: 20px;
        }
        .class{
            display : flex;
            justify-content:center;
            align-items:center;
        }
        .class-left, .class-mid, .class-right{
            width:100px;
            font-weight: bold;
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

<div class="title" style="width:150px; margin-left:20px;"><h2 data-role="classes"><Strong>Go Back</Strong></h2></div>
<div class="SC-form-container">
    
    <div style="overflow-x:auto;">
    <table class="table table-bordered">
        <tr>
            <th>Faculty Name</th>
            <td><?php echo '<i>'.$row['faculty_name'].'</i>';?></td>
        </tr>
        <tr>
            <th>Stream</th>
            <td><?php echo $row['stream'];?></td>
        </tr>
        <tr>
            <th>Semester</th>
            <td><?php echo $row['sem'];?></td>
        </tr>
        <tr>
            <th>Section</th>
            <td><?php echo $row['section'];?></td>
        </tr>
        <tr>
            <th>Subject</th>
            <td><?php echo $row['subject'];?></td>
        </tr>
        <tr>
            <th>Topic</th>
            <td><?php echo $row['topic'];?></td>
        </tr>
        <tr>
            <th>Date</th>
            <td><?php $originalDate = $row['date'];
$newDate = date("d-m-Y", strtotime($originalDate)); echo $newDate; ?></td>
        </tr>
        <tr>
            <th>Time</th>
            <td><?php $time = date("g:i a", strtotime($row['time']));
            echo $time; ?></td>
        </tr>
        <?php
            if($row['classlink']==''||$row['classlink']==NULL){
            ?>
        <tr>
            <th colspan="2" class="text-center">No Class Links Available</th>
        </tr>
        <?php
            }
            else{
        ?>
        <tr>
            <td colspan="2" class="text-center"><a href="<?php echo $row['classlink'];?>" target="_blank"><button class="btn btn-outline-success" >Class Link</button></a></th>
        </tr>
        <?php
            }
        ?>
    </table>
    </div>
</div>
<script>
      $(document).ready(function(){
            $(document).on('click','h2[data-role=classes]',function(){
              // alert($(this).data('id'));
              $.post('classes_list.php',
                function(data,status){
                    $('#student_class').html(data);
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