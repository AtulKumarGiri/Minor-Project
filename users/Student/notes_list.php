<?php
session_start();

if($_SESSION['login'] && $_SESSION['student']){


include 'connection.php';
$stream=$_SESSION['user']['stream'];
$sem=$_SESSION['user']['semester'];
$section=$_SESSION['user']['section'];

$query = "SELECT * FROM upload_notes where stream='$stream' and sem='$sem' and (section='$section' or section='Combined') order by date";
$result = mysqli_query($conn,$query);


$sql="select * from streams where stream='$stream'";
$q=mysqli_query($conn,$sql);
$r=mysqli_fetch_assoc($q);
$stream_id=$r['id'];
$sql="select * from semesters where sem='$sem' and streams_id='$stream_id'";
$q=mysqli_query($conn,$sql);
$r=mysqli_fetch_assoc($q);
$semesters_id=$r['id'];
// echo $query;
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
  <link rel="stylesheet" href="../../css/Overlay.css">
  <title>Student Classes</title>
    
</head>

<body>

     <table class="table table-hover table-fixed">
            <tr>
                <th style="min-width:80px;">SL No</th>
                <th class="select">
                  <select name="" id="FilterSubjectN" onchange="FilterSubjectN(this.value)">
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
                <th>Topic</th>
                <th class="select">
                <select name="" id="FilterDateN" onchange="FilterDateN(this.value)">
                    <option value="all" selected>Date</option>
                    <option value="today">Today</option>
                    <option value="tommorow">Yesterday</option>
                    <option value="week">Last Week</option>
                    <option value="month">Last Month</option>
                  </select>
                </th>
                <!-- <th>Time</th> -->
                <!-- <th>View</th> -->
                <!-- <th>Delete</th> -->
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
                    <td style="min-width:300px;"><?php echo $row['topic']; ?></td>
                    <td style="min-width:100px;"><?php $originalDate = $row['date'];
$newDate = date("d-m-Y", strtotime($originalDate)); echo $newDate; ?></td>
                    <!-- <td><button class="btn btn-outline-success"> View </button></td> -->
                    
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


    <script>
    function FilterSubjectN(subjectget){
            dateget=$("#FilterDateN").val();
            // alert(dateget);
            $.ajax({
              type:'post',
              url: 'notes_filter.php',
              data : { date : dateget, subject : subjectget},
              success : function(data){
                $('#student_notes').html(data);
              }

            })
          }
          function FilterDateN(dateget){
            subjectget=$("#FilterSubjectN").val();
            $.ajax({
              type:'post',
              url: 'notes_filter.php',
              data : { date : dateget, subject : subjectget},
              success : function(data){
                $('#student_notes').html(data);
              }

            })
          }
      $(document).ready(function(){
            $(document).on('click','tr[data-role=view]',function(){
              // alert($(this).data('id'));
              var dataid=$(this).data('id');
              $.post('notes_view.php',{
                viewid : dataid },
                function(data,status){
                    $('#student_notes').html(data);
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