<?php
include("connection.php");
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
<!--  <link rel="stylesheet" type="" href="style.css">-->
 <!-- <link rel="stylesheet" href="scheduleclassform.css">-->
    <link rel="stylesheet" media="screen and (max-width:902px)" href="css/mobile1.css">
</head>

<body>
<style>
@media only screen and (max-width: 600px)
.UQ_container{
 position:absolute;
 top:33px;

}
@media only screen and (max-width: 400px){
    .UQ_container{
 position:absolute;
 top:100px;

}
}
</style>
<!--<div class="yp-heading mt-5">
         <div class="row mb-3">
        <div class="col-6">
             <a href="yearpaper.php" class="btn d-block btn-success btn-lg btn-block" id="yp-list" >See Papers</a>
        </div>
        <div class="col-6">
            <a href="UploadQuestion.php" class="btn d-block btn-success btn-lg btn-block" id="yp-new" disabled>New Paper</a>
        </div>
    </div>
</div>-->
<div class="sc-heading">
      <div class="sc-heading-part">
        <button type="button" class="btn btn-success btn-lg btn-block" id="yp-list">See Papers</button>
      </div>
      <div class="sc-heading-part">
        <button type="button" class="btn btn-success btn-lg btn-block" id="yp-new" disabled>New Paper</button>
      </div>
</div>
<hr>
<div class="UQ_container ">
    <div class="row d-flex justify-content-center">
      <div class="col-lg-8 col-12">
        <div class="card">
         <!--  <h3 class="bg-success text-center text-light p-4">Upload Question paper</h3> -->
          <form class="row mt-4 mb-4 px-4" action="yearpaperformdata.php" method="POST" enctype="multipart/form-data">
            <div class="col-md-6">
              <label for="inputState" class="form-label">Choose Stream</label>
              <select  name="streamYP" class="form-select" id="FilterCourse" onchange="FilterStream(this.value)">
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
            <div class="col-md-6">
              <label for="inputState" class="form-label">Choose Semester</label>
              <select  name="semesterYP" class="form-select" id="FilterSemester" onchange="filtersubject(this.value)">
              <option selected>Select Semester</option>
              </select>
            </div>
            <div class="col-md-6">
              <label for="inputState" class="form-label">Choose Subject</label>
              <select name="subjectYP" class="form-select" id="FilterSubject">
               <option selected>Select Subject</option>
              </select>
            </div>
            <div class="col-md-6">
              <label for="inputState" class="form-label">Choose Year</label>
              <select id="inputState" name="year" class="form-select">
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
              <!--  <option value="2020">2020 </option>
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
            <div class="col-md-12">
              <label for="inputCity" class="form-label">Upload File</label>
              <input type="file" class="form-control" name="question_file" id="file" required>
            </div>

            <div class="row d-flex justify-content-center">
                <div class="col-5 mt-3">
                    <button type="submit" name="submit_quest" class="btn btn-success btn-lg d-block btn-block ">Upload Question Paper</button>
                </div>
            </div>
          </form>
        </div>
      </div>
    </div>
 <!-- filter box -->
  <script type="text/javascript" src="Js/Question.js"></script>
  <!-- filter box -->
      <script>
   
      $(document).ready(function(){
            $('#yp-new').click(function(){
                alert(hi);
               $.post('UploadQuestion.php',function(data,status){
                    $('#change-yearpaper').html(data);
                })
            });
            $('#yp-list').click(function(){
                $.post('yearpaperlist.php',function(data,status){
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