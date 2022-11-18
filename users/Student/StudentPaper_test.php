<?php
error_reporting(0);
include("connection.php");
$course = $_POST['stream'];
$semester = $_POST['semester'];
$subject = $_POST['subject'];
$year = $_POST['year'];
$resultcourse = $conn->query("SELECT * FROM streams WHERE id='$course'")->fetch_assoc();
$resultsemester = $conn->query("SELECT * FROM semesters WHERE id='$semester'")->fetch_assoc();
$resultsubject = $conn->query("SELECT * FROM subjects WHERE id='$subject'")->fetch_assoc();
$result = $conn->query("SELECT * FROM q_paper WHERE stream='$course'and semester='$semester'and subject='$subject' and year='$year'")->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
     <link rel="stylesheet" type="" href="style.css">
     <style>
    *{
        /* font-family: Bai Jamjuree; */
        
    }
    .sc-header {
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
    /* border: 2px solid red; */
    float: right;
    color: #05386b;
    /* font-family: Verdana, Geneva, Tahoma, sans-serif; */
    font-size: 17px;
    margin: auto 10px;
    width: 300px;
    /* margin: 60px 0px 0px 12px; */
    /* font-family: Bai Jamjuree; */
    font-family: 'Poppins', sans-serif;
}
  </style>
</head>

<body>
   <div class="sc-header">
      <div class="sc-header-logo">
        <a href="index.php"><img src="../../images/logo.png" alt="TihCollegeSpace"></a>
      </div>
      <div class="sc-header-name">
        <a href="index.php"><h2>TIH College Space</h2></a>
      </div>
  </div>

    <div class="QP_container mt-5">
        <div class="row d-flex justify-content-center">
            <div class="col-lg-12 col-12 ">
                <div class="card">
                    <h3 class="bg-success text-center text-light p-2">Question Paper</h3>
                    <form class="row mt-3 mb-3 px-4 " id="S_form" method="POST" enctype="multipart/form-data">
                   <div class="col-md-2">
              <label for="inputState" class="form-label"><font color="red">*</font>Choose Stream</label>
              <select  name="stream" class="form-select" id="FilterCourse" onchange="FilterStream(this.value)">
                <option selected>Select Course</option>
                <?php
                $course = $conn->query("SELECT * FROM streams order by id desc");
                while ($course_type = $course->fetch_assoc()) {
                ?>
                  <option value="<?php echo $course_type['id'] ?>"> <?php echo $course_type['stream'] ?> </option>
                <?php
                }
                ?>
              </select>
            </div>
            <div class="col-md-2">
              <label for="inputState" class="form-label"><font color="red">*</font>Choose Semester</label>
              <select  name="semester" class="form-select" id="FilterSemester" onchange="filtersubject(this.value)">
              <option selected>Select Semester</option>
              </select>
            </div>
            <div class="col-md-2">
              <label for="inputState" class="form-label"><font color="red">*</font>Choose Subject</label>
              <select name="subject" class="form-select" id="FilterSubject">
               <option selected>Select Subject</option>
              </select>
            </div>
                <div class="col-md-2">
                    <label for="inputState" class="form-label"><font color="red">*</font>Choose Year</label>
                    <select name="year" id="year" class="form-select">
                        <option value="">Year</option>
                        <?php
                           $sql="select * from year where year!='all'";
                           $q1=mysqli_query($conn,$sql);
                           if (mysqli_num_rows($q1) > 0 ) {
                             while ($row = mysqli_fetch_assoc($q1)) {
                              echo '<option value='.$row['year'].'>'.$row['year'].'</option>';
                             }
                         }
                        ?>
                        <!--<option value="2020">2020 </option>
                        <option value="2019">2019 </option>
                        <option value="2018">2018 </option>
                        <option value="2017">2017 </option>
                        <option value="2016">2016 </option>
                        <option value="2015">2015 </option>
                        <option value="2014">2014 </option>
                        <option value="2013">2013 </option>
                        <option value="2012">2012 </option>
                        <option value="2011">2011 </option>
                        <option value="2010">2010 </option>
                        <option value="2009">2009 </option>-->
                    </select>
                </div>

                <div class="col-4 mt-3">
                    <button type="button" name="submit_quest" value="ok" onclick="paperquest(this.value)" class="btn btn-lg  btn-block btn-success">Search </button>
                </div>
            </form>
        </div>
      </div>
      </div>
       <table class="table table-hover table-light table-stiped id=paper_table mr-2" id="emptypaper"style="visibility: " >
                <thead class="thead-dark mr-1">
                    <tr>
                        <!--<th scope="col">SL-No</th> -->
                        <th scope="col">Stream</th>
                        <th scope="col">Semester</th>
                        <th scope="col">Subject</th>
                         <th scope="col">Year</th>
                       <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody id="paperfilter">

                
                </tbody>
            </table>

        </div> 
    <script>
      $(document).ready(function(){
       $("#S_form").on('submit_quest',function(e){
    e.preventDefault();
    var product=$('#emptypaper').val();
   alert($('#emptypaper').val());
      }

    </script>

<!-- filter box -->
  <script type="text/javascript" src="Js/Question.js"></script>
  <!-- filter box -->

</body>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</html>