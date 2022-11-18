<?php
session_start();

if($_SESSION['login'] && $_SESSION['student']){


include 'connection.php';


$stream=$_SESSION['user']['stream'];
$sem=$_SESSION['user']['semester'];
$section=$_SESSION['user']['section'];
$semesters_id=$_POST['sem'];
$subject_id=$_POST['subject'];
$sql="select * from streams where stream='$stream'";
$q=mysqli_query($conn,$sql);
$r=mysqli_fetch_assoc($q);
$stream_id=$r['id'];
$sql="select * from semesters where sem='$sem' and streams_id='$stream_id'";
$q=mysqli_query($conn,$sql);
$r=mysqli_fetch_assoc($q);
$semesters_id=$r['id'];
$subject="all";
if($subject_id!="all"){
$sql="select * from subjects where id='$subject_id'";
$q=mysqli_query($conn,$sql);
$r=mysqli_fetch_assoc($q);
$subject=$r['subject'];
}
$dateprint=$_POST['date'];
// echo $subject;
// echo $dateprint;
// $newDateString = date_format(date_create_from_format('d-m-Y', $dateprint),'Y-m-d' );
// $dateprint=$newDateString;
// $date=date_create(date("d-m-Y"));
// $section="Beta";
if($subject=="all"){
    if($dateprint=="all"){
        $query="SELECT * from upload_notes WHERE stream='$stream' and sem='$sem' and (section='$section' or section='Combined')  ORDER BY date desc";
      }
      else
      if($dateprint=="today"){
        $date=date_create(date("Y-m-d"));
        date_add($date,date_interval_create_from_date_string("0 days"));
        $dateupto=date_format($date,"Y-m-d");
        $query = "SELECT * FROM upload_notes WHERE stream='$stream' and sem='$sem' and (section='$section' or section='Combined') and date='$dateupto' ORDER BY date desc";
      }
      else
      if($dateprint=="tommorow"){
        $date=date_create(date("Y-m-d"));
        date_add($date,date_interval_create_from_date_string("-1 days"));
        $dateupto=date_format($date,"Y-m-d");
        $query = "SELECT * FROM upload_notes WHERE stream='$stream' and sem='$sem'  and (section='$section' or section='Combined') and date='$dateupto' ORDER BY date desc";
      }
      else
      if($dateprint=="week"){
        $date=date_create(date("Y-m-d"));
        date_add($date,date_interval_create_from_date_string("-7 days"));
        $dateupto=date_format($date,"Y-m-d");
        $query = "SELECT * FROM upload_notes WHERE stream='$stream' and sem='$sem'  and (section='$section' or section='Combined') and date>='$dateupto' ORDER BY date desc";
      }
      else
      if($dateprint=="month"){
        $date=date_create(date("Y-m-d"));
        date_add($date,date_interval_create_from_date_string("-30 days"));
        $dateupto=date_format($date,"Y-m-d");
        $query = "SELECT * FROM upload_notes WHERE stream='$stream' and sem='$sem' and (section='$section' or section='Combined') and date>='$dateupto' ORDER BY date desc";
      }
}
else{
    if($dateprint=="all"){
        $query="SELECT * from upload_notes WHERE stream='$stream' and sem='$sem' and subject='$subject'  and (section='$section' or section='Combined') ORDER BY date desc";
      }
      else
      if($dateprint=="today"){
        $date=date_create(date("Y-m-d"));
        date_add($date,date_interval_create_from_date_string("0 days"));
        $dateupto=date_format($date,"Y-m-d");
        $query = "SELECT * FROM upload_notes WHERE stream='$stream' and sem='$sem' and subject='$subject'   and (section='$section' or section='Combined') and date='$dateupto' ORDER BY date desc";
      }
      else
      if($dateprint=="tommorow"){
        $date=date_create(date("Y-m-d"));
        date_add($date,date_interval_create_from_date_string("-1 days"));
        $dateupto=date_format($date,"Y-m-d");
        $query= "SELECT * FROM upload_notes WHERE stream='$stream' and sem='$sem' and subject='$subject' and (section='$section' or section='Combined') and date='$dateupto' ORDER BY date desc";
      }
      else
      if($dateprint=="week"){
        $date=date_create(date("Y-m-d"));
        date_add($date,date_interval_create_from_date_string("-7 days"));
        $dateupto=date_format($date,"Y-m-d");
        $query = "SELECT * FROM upload_notes WHERE stream='$stream' and sem='$sem' and subject='$subject'   and (section='$section' or section='Combined') and date>='$dateupto' ORDER BY date desc";
      }
      else
      if($dateprint=="month"){
        $date=date_create(date("Y-m-d"));
        date_add($date,date_interval_create_from_date_string("-30 days"));
        $dateupto=date_format($date,"Y-m-d");
        $query = "SELECT * FROM upload_notes WHERE stream='$stream' and sem='$sem' and subject='$subject' and (section='$section' or section='Combined') and date>='$dateupto' ORDER BY date desc";
      }
}

// $query="select * from upload_notes where stream='$stream' and (section='Beta' or section='Combined')";
// echo $query;
$result = mysqli_query($conn,$query);
$dates=$_POST['date'];
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
       <table class="table table-hover">
            <tr>
            <div id="sem" style="display:none"><?php //echo $semesters_id; ?>
                <th style="min-width:80px;">SL No</th>
                <th class="select">
                  <select name="" id="FilterSubjectN" onchange="FilterSubjectN(this.value)">
                    <option value="all" <?php if($subject_id=='all'){ echo 'selected'; }?> ><?php if($subject_id=='all'){ echo 'Subject';}else{echo 'All Subject';}?></option>
                    <?php
                      $sql="select * from subjects where semesters_id='$semesters_id'";
                      $q1=mysqli_query($conn,$sql);
                      if (mysqli_num_rows($q1) > 0 ) {
                        while ($row = mysqli_fetch_assoc($q1)) {
                            if($row['id']==$subject_id){
                                echo '<option value='.$row['id'].' selected >'.$row['subject'].'</option>';
                            }
                            else{
                          echo '<option value='.$row['id'].'>'.$row['subject'].'</option>';
                            }
                        }
                      }

                    ?>
                  </select>
                </th>
                <th>Faculty</th>
                <th>Topic</th>
                <th class="select">
                <select name="" id="FilterDateN" onchange="FilterDateN(this.value)">
                    <option value="all" <?php if($dates=="all"){echo 'selected';} ?>><?php if($dates!="all"){echo "All Date"; }else{ echo "Date"; }?></option>
                    <option value="today" <?php if($dates=="today"){echo 'selected';} ?>>Today</option>
                    <option value="tommorow" <?php if($dates=="tommorow"){echo 'selected';} ?>>Yesterday</option>
                    <option value="week" <?php if($dates=="week"){echo 'selected';} ?>>Last Week</option>
                    <option value="month" <?php if($dates=="month"){echo 'selected';} ?>>Last Month</option>
                  </select>
                </th>
                
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