<?php
session_start();

if($_SESSION['login'] && $_SESSION['student']){

include 'connection.php';
$viewid=$_POST['viewid'];
$query = "SELECT * FROM upload_notes WHERE id='$viewid'";
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
<div >
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
        <?php
            if($row['file']==''||$row['file']==NULL){
            ?>
        <tr>
            <th colspan="2" class="text-center">No Notes Available</th>
        </tr>
        <?php
            }
            else{
                $array=explode(",",$row['file']);
        ?>
        <tr>
            <th>Notes</th>
            <td class="text-center">
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
        <?php
            if($row['recordinglink']==''||$row['recordinglink']==NULL){
            ?>
        <tr>
            <th colspan="2" class="text-center">No Recordings Available</th>
        </tr>
        <?php
            }
            else{
        ?>
        <tr>
            <td colspan="2" class="text-center"><a href="<?php echo $row['recordinglink'];?>" target="_blank"><button class="btn btn-outline-success" >Class Recording Link</button></a></th>
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
              $.post('notes_list.php',
                function(data,status){
                    $('#student_notes').html(data);
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