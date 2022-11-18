<?php
include 'connection.php';
session_start();
$faculty_id=$_SESSION['user']['unique_id'];
$query = "SELECT * FROM q_paper order by date desc";
$result = mysqli_query($conn,$query);


$stream="all";
$sem='all';
$subject="all";
$year="all";



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
      <link rel="stylesheet" type="" href="style.css">
       <link rel="stylesheet" href="style_student.css">
</head>
<body>
<style>
   /* .sc-header {
    height: 100px;
    width: 100%;
    display: flex;
    position: relative;
    margin-bottom: -43px;
    z-index: 2;
    overflow: hidden;
    background: white;
    /* font-family: Bai Jamjuree; */
    /* font-family: Verdana, Geneva, Tahoma, sans-serif; */
    font-family: 'Poppins', sans-serif;
}
.sc-header-name{
    /* border: 2px solid red; 
    float: right;
    color: #05386b;
    font-family: Verdana, Geneva, Tahoma, sans-serif; 
    font-size: 17px;
    margin: auto 10px;
    width: 300px;
    /* margin: 60px 0px 0px 12px; 
     font-family: Bai Jamjuree; 
    font-family: 'Poppins', sans-serif; */
}

@media only screen and (max-width: 360px){
    .table td,th {width: 100%;}
}

    .action{
        z-index: 99;
    }
  
</style>

<!--<div class="container  mt-5">
    <div class="row py-5">
        <div class="col-6">
             <a href="yearpaper.php" class="btn d-block btn-success btn-lg btn-block" id="yp-list" >See Papers</a>
        </div>
        <div class="col-6">
            <a href="UploadQuestion.php" class="btn d-block btn-success btn-lg btn-block" id="yp-new" disabled>New Paper</a>
        </div>
    </div>
</div>-->
<!---<div class="sc-heading">
      <div class="sc-heading-part">
        <button type="button" class="btn btn-success btn-lg btn-block" id="yp-list" disabled>See Papers</button>
      </div>
      <div class="sc-heading-part">
        <button type="button" class="btn btn-success btn-lg btn-block" id="yp-new">New Paper</button>
      </div>
</div>
 <div class="sc-header">
      <div class="sc-header-logo">
        <a href="index.php"><img src="../../images/logo.png" alt="TihCollegeSpace"></a>
      </div>
      <div class="sc-header-name">
        <a href="index.php"><h2>TIH College Space</h2></a>
      </div>
  </div>--->

<div class="YP_container">
    <div class="change-table-YP col-lg-12 col-md-8 col-12" style="overflow-x:auto;overflow-y:auto;">
        
    <table class="table table-hover">
    <tr>
            <th scope="col">Serial No</th>
            <th class="select" scope="col">
            <select name="" id="FilterStreamYP" onchange="FilterStreamYP(this.value)">
                    <option value="all" selected >Stream</option>
                    <?php
                      $sql="select * from streams";
                      $q1=mysqli_query($conn,$sql);
                      if (mysqli_num_rows($q1) > 0 ) {
                        while ($row = mysqli_fetch_assoc($q1)) {
                          echo '<option value='.$row['id'].'>'.$row['stream'].'</option>';
                        }
                      }

                    ?>
                  </select>
          </th>
          <?php if($stream=='all'){
                ?>
            <th>Semester</th>
            <?php
            }
            else{
                ?>
            <th class="select" scope="col">
                  <select name="" id="FilterSemester" onchange="FilterSemesterYP(this.value)">
                    <option value="all" selected>Sem</option>
                    <?php
                      $sql="select * from update_sem where sem!='all'";
                      $q1=mysqli_query($conn,$sql);
                      if (mysqli_num_rows($q1) > 0 ) {
                        while ($row = mysqli_fetch_assoc($q1)) {
                          echo '<option value='.$row['sem'].'>'.$row['sem'].'</option>';
                        }
                      }

                    ?>
                  </select>
            </th>
            <?php
            }
            if($sem=='all'){
                ?>
            <th>Subject</th>
            <?php
            }
            else{
                ?>
            <th class="select"  scope="col">
            <select name="" id="FilterSubject" onchange="FilterSubjectYP(this.value)">
                    <option value="all" selected>Subject</option>
                    <?php
                      $sql="select * from subjects where subject!='all'";
                      $q1=mysqli_query($conn,$sql);
                      if (mysqli_num_rows($q1) > 0 ) {
                        while ($row = mysqli_fetch_assoc($q1)) {
                          echo '<option value='.$row['id'].'>'.$row['subject'].'</option>';
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
                    <option value="all" selected>Year</option>
                    <?php
                      $sql="select * from year where year!='all'";
                      $q1=mysqli_query($conn,$sql);
                      if (mysqli_num_rows($q1) > 0 ) {
                        while ($row = mysqli_fetch_assoc($q1)) {
                          echo '<option value='.$row['year'].'>'.$row['year'].'</option>';
                        }
                      }

                    ?>
                  </select>
            </th>
            <th scope="col"style="min-width:100px;">Date</th>
            <th scope="col"style="min-width:100px;">Action</th>
        </tr>
        <?php
            if (mysqli_num_rows($result) > 0 ) {
                $sl=0;
                while ($row = mysqli_fetch_assoc($result)) {
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
                        <a href="<?php echo $row['question_paper']; ?>" class="btn-info btn btn-sm" target="_blank">Download</a>
                        &nbsp;
                    </td>
       
                </tr>
                <?php
                }
            }
        ?> 
     </tbody>
    </table>
    <?php
    
        if (mysqli_num_rows($result) == 0 ){
        ?>
            <p class="text-center">No Records Found.</p>
        <?php
        }
    ?>
    </div>
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
            streamget=$("#FilterStream").val();
            subjectget=$("#FilterSubject").val();
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
            streamget=$("#FilterStream").val();
            semget=$("#FilterSemester").val();
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
            streamget="all";
            semget="all";
            subjectget="all";
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

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</body>
</html>