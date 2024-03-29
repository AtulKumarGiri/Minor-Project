<?php
session_start();

if($_SESSION['login'] && $_SESSION['teacher']){

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
        .faculty-details{
            margin:auto;
            margin-top: -5px;
            margin-bottom: 20px;
        }
        .faculty{
            display : flex;
            justify-content:center;
            align-items:center;
        }
        .faculty-left{
            width:150px;
            font-weight: bold;
        }
        .faculty-right{
            width:150px;
            font-weight: bold;
            font-style: italic;
        }
        @media only screen and (max-width: 400px){
            .faculty-right{
            width:150px;
            font-weight: bold;
            font-style: italic;
        }
        #change-scheduleclass{
        margin-top:100px;
        /* background:red; */
    }
            #sc-action-change{
                /* background: yellow; */
                margin-top: 100px;
            }
        }
    </style>
</head>
<body>
<div class="sc-heading">
      <div class="sc-heading-part">
        <button type="button" class="btn btn-success btn-lg btn-block" id="sc-list" onclick="ScheduleList()">List of Classes</button>
      </div>
      <div class="sc-heading-part">
        <button type="button" class="btn btn-success btn-lg btn-block" id="sc-new" onclick="ScheduleNew()">New Class</button>
      </div>
</div>
<div class="SC-form-container">
    <div class="sc-action d-block mr-0 ml-auto" id="sc-action-change">
        <?php include 'sc_action_remove.php'; ?>
    </div>
    <div class="faculty-details">
        <div class="faculty">
            <div class="faculty-left">
                Faculty Id
            </div>
            <div class="faculty-right">
                <?php echo $row['faculty_id'];?>
            </div>
        </div>
        <div class="faculty">
            <div class="faculty-left">
                Faculty Name
            </div>
            <div class="faculty-right">
                <?php echo $row['faculty_name'];?>
            </div>
        </div>
    </div>
    <div>
    <table class="table table-bordered">
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
            echo $time;?></td>
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
            $('#sc-new').click(function(){
                // $.get('get.html',function(data,status){
                //     $('#changehere').html(data);
                //     alert(status);
                // });
                $.post('scheduleclassform.php',function(data,status){
                    $('#change-scheduleclass').html(data);
                })
            });
            $('#sc-list').click(function(){
                // $.get('get.html',function(data,status){
                //     $('#changehere').html(data);
                //     alert(status);
                // });
                $.post('scheduleclasslist.php',function(data,status){
                    $('#change-scheduleclass').html(data);
                })
            });
            $('#sc-action').click(function(){
                // $.get('get.html',function(data,status){
                //     $('#changehere').html(data);
                //     alert(status);
                // });
                $.post('sc_action.php',function(data,status){
                    $('#sc-action-change').html(data);
                })
            });
        });
    </script>
    <?php
  }
else{
  header("location:../../index.html");
}
?>
</body>
</html>