<?php
session_start();

if($_SESSION['login'] && $_SESSION['student']){


include 'connection.php';

$date=date_create(date("Y-m-d"));
// date_add($date,date_interval_create_from_date_string("1 days"));
$dateupto=date_format($date,"Y-m-d");
$query="delete from schedule_class where date<'$dateupto'";
mysqli_query($conn,$query);

$stream=$_SESSION['user']['stream'];
$sem=$_SESSION['user']['semester'];
$section=$_SESSION['user']['section'];
$query = "SELECT * FROM schedule_class where stream='$stream' and sem='$sem' and (section='$section' or section='Combined')  order by date";
$result = mysqli_query($conn,$query);

$sql="select * from streams where stream='$stream'";
$q=mysqli_query($conn,$sql);
$r=mysqli_fetch_assoc($q);
$stream_id=$r['id'];
$sql="select * from semesters where sem='$sem' and streams_id='$stream_id'";
$q=mysqli_query($conn,$sql);
$r=mysqli_fetch_assoc($q);
$semesters_id=$r['id'];
// echo '<br>'.$stream.'<br>'.$sem.'<br>'.$stream_id.'<br>'.$semesters_id;




?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style_student.css">
  <link rel="stylesheet" href="style.css">
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <!-- jQuery -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

  <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    
  <link rel="stylesheet" href="../../css/Overlay.css">
  <title>Student Classes</title>
    
</head>

<body>
       <table class="table table-hover">
            <tr>
                <th style="min-width:80px;">SL No</th>
                <th class="select">
                  <select name="" id="FilterSubjectC" onchange="FilterSubjectC(this.value)">
                    <option value="all" selected>Subject</option>
                    <?php
                      $sql="select * from subjects where semesters_id='$semesters_id'";
                      $q1=mysqli_query($conn,$sql);
                      if (mysqli_num_rows($q1) > 0 ) {
                        while ($row = mysqli_fetch_assoc($q1)) {
                          echo '<option value='.$row['id'].'>'.$row['subject'].'</option>';
                        }
                      }

                    ?>
                  </select>
                </th>
                <th>Faculty</th>
                <th class="select">
                <select name="" id="FilterDateC" onchange="FilterDateC(this.value)">
                    <option value="all" selected>Date</option>
                    <option value="today">Today</option>
                    <option value="tommorow">Tommorrow</option>
                    <option value="week">This Week</option>
                    <option value="month">This Month</option>
                  </select>
                </th>
                <th>Time</th>
            </tr>
            <?php
              if (mysqli_num_rows($result) > 0) {
                $sl=0;
                while ($row = mysqli_fetch_assoc($result)) {
                    $sl++;
                  ?>
                  <tr data-role="view" data-id="<?php echo $row['id'];?>" style="cursor:pointer;">
                    <th><?php echo $sl; ?></th>
                    <td style="min-width:500px;"><?php echo $row['subject']; ?></td>
                    <td style="min-width:150px;"><?php echo $row['faculty_name']; ?></td>
                  
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
        
          if (mysqli_num_rows($result) == 0){
            ?>
              <p class="text-center">No Records Found.</p>
            <?php
          }
        ?>





    <script>

    function FilterSubjectC(subjectget){
            dateget=$("#FilterDateC").val();
            // alert(dateget);
            $.ajax({
              type:'post',
              url: 'classes_filter.php',
              data : { date : dateget, subject : subjectget},
              success : function(data){
                $('#student_class').html(data);
              }

            })
          }
          function FilterDateC(dateget){
            subjectget=$("#FilterSubjectC").val();
            $.ajax({
              type:'post',
              url: 'classes_filter.php',
              data : { date : dateget, subject : subjectget},
              success : function(data){
                $('#student_class').html(data);
              }

            })
          }



      $(document).ready(function(){
          
            $(document).on('click','tr[data-role=view]',function(){
              // alert($(this).data('id'));
              var dataid=$(this).data('id');
              $.post('classes_view.php',{
                viewid : dataid },
                function(data,status){
                    $('#student_class').html(data);
                })
            });
          });
          function reloadpage(){
            location.reload();
          }
    </script>
    <script src="admin.js"></script>
<?php
  }
else{
  header("location:../../index.html");
}
?>

    </body>

</html>