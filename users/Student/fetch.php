<?php
include('connection.php');

      if(isset($_POST['request'])){

          $request = $_POST['request'];

          $query = "SELECT * FROM q_paper stream = '$request'";
          $result = mysqli_query($conn,$query);
          $count = mysqli_num_rows($result);
?>
<table class="table table-hover table-light table-stiped id=paper_table">
<?php
    if($count){
?> 
      <thead class="thead-dark">
         <tr>
           <th scope="col">SL-No</th>
           <th scope="col">Stream</th>
           <th scope="col">Semester</th>
           <th scope="col">Subject</th>
           <th scope="col">Year</th>
           <th scope="col">Action</th>
         </tr>
         <?php
    }else{
        echo "No record Found";
    }
         ?>
     </thead>
     <tbody>
      <?php
     while ($row = mysqli_fetch_assoc($result)) {
          ?>
            <tr>
                <td><?php echo $row['id'] ?></td>
                <td><?php echo $row['stream'] ?></td>
                <td><?php echo $row['sem'] ?></td>
                <td><?php echo $row['subject'] ?></td>
                <td><?php echo $row['year'] ?></td>
                <td><a href="../Teacher/QuestionPaper/<?php echo $row['question_paper']; ?>" class="btn-success btn btn-sm" target="_blank">Download</a></td>
               
             </tr>
                <?php
                }
                ?>

                </tbody>
  
</table>
<?php
      }
?>
<!--- <div class="row mt-5">
           <table class="table table-hover table-light table-stiped id=paper_table"  id="question">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">SL-No</th>
                        <th scope="col">Stream</th>
                        <th scope="col">Semester</th>
                        <th scope="col">Subject</th>
                        <th scope="col">Question Paper</th>
                        <th scope="col">Year</th>
                        <th scope="col">Date</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                     <php
                        if(isset($_POST['submit_quest'])){
                            $course = $_POST['stream'];
                            $semester = $_POST['semester'];
                            $subject = $_POST['subject'];
                            $year = $_POST['year'];

                        if($course != ""||$semester != ""||$subject != ""||$year != "")
                        {
                            $query = "SELECT * FROM q_paper WHERE course='$course' OR semester='$semester' OR subject='$subject' OR year='$year'" ;
                            $data = mysqli_query($conn,$query) or die(error);
                        }
                        }
                     <tr>
                <td><?php echo $result['id'] ?></td>
                <td><?php echo $resultcourse['stream'] ?></td>
                <td><?php echo $resultsemester['sem'] ?></td>
                <td><?php echo $resultsubject['subject'] ?></td>
                <td><?php echo $result['question_paper'] ?></td>
                <td><?php echo $result['year'] ?></td>
                <td><?php  ?></td>
                <td><?php  ?></td>
                 </tr>
                </tbody>
            </table>
            </div>-->