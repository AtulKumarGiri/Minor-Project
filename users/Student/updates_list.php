<?php
session_start();

if($_SESSION['login'] && $_SESSION['student']){

include 'connection.php';
$stream=$_SESSION['user']['stream'];
$sem=$_SESSION['user']['semester'];
if($sem=="SEM1"||$sem=="SEM2"){
    $year="First Year";
}
elseif($sem=="SEM3"||$sem=="SEM4"){
    $year="Second Year";
}
elseif($sem=="SEM5"||$sem=="SEM6"){
    $year="Third Year";
}
// $query = "SELECT * FROM updates order by id desc";
$query = "select * from updates where stream='$stream' and year='$year'";
// echo $query;
$result = mysqli_query($conn,$query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Updates</title>
    <link rel="shortcut icon" href="../../images/logo.png" />
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="style_student2.css">
<link rel="stylesheet" href="style_student.css">
  <link rel="stylesheet" href="style.css">
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <!-- jQuery -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <link rel="stylesheet" href="../../css/Overlay.css">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=El+Messiri&family=Great+Vibes&family=Raleway:wght@300&display=swap" rel="stylesheet">
    <style>
    
  </style>
</head>
<body>

<div class="SC-form-container" style="overflow-x:auto; overflow-y:auto;">
    <table class="table table-hover">
        <tr>
            <th style="min-width:80px; margin:auto;">Sl No</th>
            <th style="min-width:300px;">Title</th>
            <?php
                $date=date_create(date("Y-m-d"));
            ?>
            <th class="select" style="min-width:100px;">
                <select name="" id="FilterDateU" onchange="FilterDateU(this.value)">
                    <option value="all">Date</option>
                    <option value="today">Today</option>
                    <option value="yesterday">Yesterday</option>
                    <option value="week">Last Week</option>
                    <option value="month">Last Month</option>
                  </select>
                </th>
            <th style="min-width:100px;">Time</th>
            <!-- <th>View</th> -->
        </tr>
        <?php
            if (mysqli_num_rows($result) > 0) {
                $sl=0;
                while ($row = mysqli_fetch_assoc($result)) {
                    $sl++;
                    ?>
                  <tr data-role="view" data-id="<?php echo $row['id'];?>" style="cursor:pointer;">
                    <th style="min-width:80px; margin:auto;"><?php echo $sl; ?></th>
                    <td style="min-width:300px;"><?php echo $row['title']; ?></td>
                    <td style="min-width:100px;"><?php $originalDate = $row['date'];
$newDate = date("d-m-Y", strtotime($originalDate)); echo $newDate; ?></td>
                    <td style="min-width:100px;"><?php $time = date("g:i a", strtotime($row['time']));
            echo $time; ?></td>
                </tr>
                <?php
                }
            }
        ?> 
    </table>
    <?php
    
        if (mysqli_num_rows($result) == 0 ){
        ?>
            <p class="text-center">No Records Found.</p>
        <?php
        }
    ?>
</div>

<script>
function FilterDateU(dateget){
            $.ajax({
              type:'post',
              url: 'updates_filter.php',
              data : { date : dateget},
              success : function(data){
                $('#student_updates').html(data);
              }

            })
          }

      $(document).ready(function(){
            $(document).on('click','tr[data-role=view]',function(){
              // alert($(this).data('id'));
              var dataid=$(this).data('id');
              $.post('updates_view.php',{
                viewid : dataid },
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