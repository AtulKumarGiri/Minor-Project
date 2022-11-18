<?php
include 'connection.php';
session_start();
$faculty_id=$_SESSION['user']['unique_id'];


// To store stream id

$stream=$_POST['stream'];
$stream_name='all';
if($stream!='all'){
    // To get name of stream
    $temp_sql="select * from streams where id='$stream' ";
    $temp_query=mysqli_query($conn,$temp_sql);
    $temp_row=mysqli_fetch_assoc($temp_query);
    $stream_name=$temp_row['stream'];
}

// To store sem id
$sem=$_POST['sem'];
$sem_name='all';
if($sem!='all'){
    // To get name of sem
    $temp_sql="select * from semesters where id='$sem' ";
    $temp_query=mysqli_query($conn,$temp_sql);
    $temp_row=mysqli_fetch_assoc($temp_query);
    $sem_name=$temp_row['sem'];

    // To get id of sem
    $temp_sql="select * from semesters where sem='$sem_name' and streams_id='$stream' ";
    $temp_query=mysqli_query($conn,$temp_sql);
    $temp_row=mysqli_fetch_assoc($temp_query);
    $sem=$temp_row['id'];
}

// To store subject id
$subject=$_POST['subject'];
$year=$_POST['year'];

// echo '<br>Stream : '.$stream_name;
// echo '<br>Stream ID : '.$stream;
// echo '<br>Semester : '.$sem_name;
// echo '<br>Sem id : '.$sem;
// echo '<br> '.$stream.' '.$sem.' '.$subject.' '.$year.'<br>';

if($stream=='all'){
    if($year=='all'){
        $q = "select * from q_paper order by year desc,stream asc,semester asc,subject asc";
    }
    else{
        $q = "select * from q_paper where year='$year' order by stream asc,semester asc,subject asc";
    }
}
else{
    if($sem=='all'){
        if($year=='all'){
            $q = "select * from q_paper where stream='$stream' order by year desc,semester asc,subject asc";
        }
        else{
            $q = "select * from q_paper where stream='$stream' and year='$year' order by semester asc,subject asc";
        }
    }
    else{
        if($subject=='all'){
            if($year=='all'){
                $q = "select * from q_paper where stream='$stream' and semester='$sem' order by year desc,subject asc";
            }
            else{
                $q = "select * from q_paper where stream='$stream' and semester='$sem' and year='$year' order by subject asc";
            }
        }
        else{
            if($year=='all'){
                $q = "select * from q_paper where stream='$stream' and semester='$sem' and subject='$subject' order by year desc";
            }
            else{
                $q = "select * from q_paper where stream='$stream' and semester='$sem' and subject='$subject' and year='$year'";
            }
            // $q = "select * from q_paper where stream='$stream' and semester='$sem' and subject='$subject' and year='$year'";
        }
    }
}

// $q = "SELECT * FROM q_paper order by date desc";
$query=$q;
// $results = mysqli_query($conn,$query);
// echo $query;

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>paper</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
      <script src="https://code.jquery.com/jquery-3.5.0.js"></script>
</head>
<body>
<style>
.YP_container{
    display: flex;
    justify-content: center;
    align-items: center;
    /* margin-top: 150px; */
}
@media only screen and (max-width: 400px){
    
}
</style>

    <div class="change-table-YP col-lg-12 col-md-8 col-12" style="overflow-x:auto;overflow-y:auto;">
        
    <table class="table table-hover">
    <tr>
            <th scope="col">Serial No</th>
            <th class="select" scope="col">
            
            <select name="" id="FilterStreamYP" onchange="FilterStreamYP(this.value)">
                    <option value="all" <?php if($stream=='all'){ echo 'selected';} ?> ><?php if($stream!='all'){ echo 'All Stream';} else { echo 'Stream';}?></option>
                    <?php
                      $sql="select * from streams";
                      $q1=mysqli_query($conn,$sql);
                      if (mysqli_num_rows($q1) > 0 ) {
                        while ($row = mysqli_fetch_assoc($q1)) {
                            if($row['id']==$stream){
                                echo '<option value='.$row['id'].' selected >'.$row['stream'].'</option>';
                            }
                            else{
                                echo '<option value='.$row['id'].'>'.$row['stream'].'</option>';
                            }
                        }
                      }

                    ?>
                  </select>
          </th>
            <?php if($stream=='all'){
                ?>
            <th id="FilterSemester" >Semester</th>
            <?php
            }
            else{
                // $sql1="select * from streams where stream='$stream'";
                // $q1=mysqli_query($conn,$sql1);
                // $r1=mysqli_fetch_assoc($q1);
                // $streams_id=$r1['id'];
                // echo $sql1.' '.$streams_id;
                ?>
            <th class="select" scope="col">
                  <select name="" id="FilterSemester" onchange="FilterSemesterYP(this.value)">
                    <option value="all" <?php if($sem=='all'){ echo 'selected';} ?> ><?php if($sem!='all'){ echo 'All Sem';} else { echo 'Semester';}?></option>
                    <?php
                      $sql="select * from semesters where streams_id='$stream'";
                    //   echo '<br>'.$sql;
                      $q1=mysqli_query($conn,$sql);
                      if (mysqli_num_rows($q1) > 0 ) {
                        while ($row = mysqli_fetch_assoc($q1)) {
                            if($row['id']==$sem){
                                echo '<option value='.$row['id'].' selected >'.$row['sem'].'</option>';
                            }
                            else{
                                echo '<option value='.$row['id'].'>'.$row['sem'].'</option>';
                            }
                        }
                      }

                    ?>
                  </select>
            </th>
            <?php
            }
            if($sem=="all"){

                ?>
            <th id="FilterSubject" >Subject</th>
            <?php
            }
            else{
                ?>
            <th class="select"  scope="col">
            <select name="" id="FilterSubject" onchange="FilterSubjectYP(this.value)">
                    <option value="all" <?php if($subject=='all'){ echo 'selected';} ?> ><?php if($subject!='all'){ echo 'All Subject';} else { echo 'Subject';}?></option>
                    <?php
                      $sql="select * from subjects where semesters_id='$sem'";
                      $q1=mysqli_query($conn,$sql);
                      if (mysqli_num_rows($q1) > 0 ) {
                        while ($row = mysqli_fetch_assoc($q1)) {
                            if($row['id']==$subject){
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
            <?php
            }
            ?>
           <!-- <th scope="col">Question Paper</th> -->
            <th class="select"  scope="col">
            <select name="" id="FilterYear" onchange="FilterYearYP(this.value)">
                    <option value="all" <?php if($year=='all'){ echo 'selected';} ?> ><?php if($year!='all'){ echo 'All Years';} else { echo 'Year';}?></option>
                    <?php
                      $sql="select * from year where year!='all'";
                      $q1=mysqli_query($conn,$sql);
                      if (mysqli_num_rows($q1) > 0 ) {
                        while ($row = mysqli_fetch_assoc($q1)) {
                          if($row['year']==$year){
                                echo '<option value='.$row['year'].' selected >'.$row['year'].'</option>';
                            }
                            else{
                                echo '<option value='.$row['year'].'>'.$row['year'].'</option>';
                            }
                        }
                      }

                    ?>
                  </select>
            </th>
            <th scope="col">Date</th>
           
            <th scope="col">Action</th>
            
        </tr>
        <?php
        // $query="select * from q_paper";
        // $result = mysqli_query($conn,$query);
        if(mysqli_query($conn,$query)){
            $result=mysqli_query($conn,$query);
        }
        else{
            $result=0;
        }
        // echo $query;
            if(mysqli_num_rows($result) > 0 ) {
                // echo $results;
                $sl=0;
                while($row = mysqli_fetch_assoc($result)) {
                    $sl++;
                    ?>
                <tr data-role="view" data-id="<?php echo $row['id'];?>" style="cursor:pointer;">                    
                    <th><?php echo $sl; ?></th>
                    <td>
                        <?php 
                            $steam_id =  $row['stream'];
                            $stream_data = $conn->query("SELECT * FROM streams where id= '$steam_id'")->fetch_assoc();
                            echo $stream_data['stream'];
                        ?>
                    </td>
                    <td>
                        <?php 
                            $semester_id = $row['semester'];
                            $sem_data = $conn->query("SELECT * FROM semesters where id= '$semester_id'")->fetch_assoc();
                            echo $sem_data['sem']; 
                        
                        ?>    
                    </td>
                    <td>
                         <?php
                            $sub_id = $row['subject'];
                            $sub_data = $conn->query("SELECT * FROM subjects where id= '$sub_id'")->fetch_assoc();
                            echo $sub_data['subject'];
                         ?>
                    </td>
                    <!-- <td><?php // echo $row['question_paper']; ?></td> -->
                    <td><?php echo $row['year']; ?></td>
                    <td><?php echo $row['date']; ?></td>
                    <td>
                        <a href="QuestionPaper/<?php echo $row['question_paper']; ?>" class="btn-info btn btn-sm" target="_blank">View</a>
                        &nbsp;
                       <a href="year_paper_delete.php?id=<?php echo $row['id']; ?>"class="btn-danger btn btn-sm" onclick='return deletedata()'> Delete </a>
                      
                    </td>
       
                </tr>
                <?php
                }
            }
        ?> 
     </tbody>
    </table>
    <?php
        // die();
        if (mysqli_num_rows($result) == 0 ){
        ?>
            <p class="text-center">No Records Found.</p>
        <?php
        }
    ?>
    </div>



<script type="text/javascript">
function FilterStreamYP(streamget){
            semget=$("#FilterSemester").val();
            semget="all";
            subjectget=$("#FilterSubject").val();
            subjectget='all';
            yearget=$("#FilterYear").val();
            $.ajax({
              type:'post',
              url: 'yearpaperfilter.php',
              data : { stream : streamget, sem : semget, subject : subjectget , year : yearget },
              success : function(data){
                $('#change-yp').html(data);
              }

            })
          }
function FilterSemesterYP(semget){
            streamget=$("#FilterStreamYP").val();
            subjectget=$("#FilterSubject").val();
            subjectget="all";
            yearget=$("#FilterYear").val();
            $.ajax({
              type:'post',
              url: 'yearpaperfilter.php',
              data : { stream : streamget, sem : semget, subject : subjectget , year : yearget },
              success : function(data){
                $('#change-yp').html(data);
              }

            })
          }
function FilterSubjectYP(subjectget){
            streamget=$("#FilterStreamYP").val();
            semget=$("#FilterSemester").val();
            if(semget=="Semester"){
                semget="all";
            }
            yearget=$("#FilterYear").val();
            $.ajax({
              type:'post',
              url: 'yearpaperfilter.php',
              data : { stream : streamget, sem : semget, subject : subjectget , year : yearget },
              success : function(data){
                $('#change-yp').html(data);
              }

            })
          }
function FilterYearYP(yearget){
            streamget=$("#FilterStreamYP").val();
            semget=$("#FilterSemester").val();
            // alert(semget);
            if(semget=="Semester"){
                semget="all";
            }
            // alert(semget);
            subjectget=$("#FilterSubject").val();
            // alert(subjectget);
            // if(subjectget="Subject"){
            //     subjectget="all";
            // }
            // alert(subjectget);
            $.ajax({
              type:'post',
              url: 'yearpaperfilter.php',
              data : { stream : streamget, sem : semget, subject : subjectget , year : yearget },
              success : function(data){
                $('#change-yp').html(data);
              }

            })
          }


  function deletedata(){
      return confirm('Are You Sure! You want to Delete this Record');
  }

</script>
<script>
    $(document).ready(function(){
             $('#yp-list').click(function(){
                $.post('yearpaperlist.php',function(data,status){
                    $('#change-yearpaper').html(data);
                })
            });
            $('#yp-new').click(function(){
               $.post('UploadQuestion.php',function(data,status){
                    $('#change-yearpaper').html(data);
                })
            });
         
        });
    </script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</body>
</html>