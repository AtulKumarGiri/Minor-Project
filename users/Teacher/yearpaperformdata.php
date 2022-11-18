<?php
include("connection.php");
$my_id = $_SESSION['id'];

if(isset($_POST['submit_quest'])){

    $stream = $_POST['streamYP'];
    $sql="select * from streams where id='$stream'";
    $q=mysqli_query($conn,$sql);
    $r=mysqli_fetch_assoc($q);
    $streamname=$r['stream'];
    if(!file_exists('../../QuestionPaper/'.$streamname)){
        mkdir('../../QuestionPaper/'.$streamname, 0777, true);
    }
    $semester = $_POST['semesterYP'];
    $sql="select * from semesters where id='$semester'";
    $q=mysqli_query($conn,$sql);
    $r=mysqli_fetch_assoc($q);
    $semname=$r['sem'];
    if(!file_exists('../../QuestionPaper/'.$streamname.'/'.$semname)){
        mkdir('../../QuestionPaper/'.$streamname.'/'.$semname, 0777, true);
    }
    $subject = $_POST['subjectYP'];
    $sql="select * from subjects where id='$subject'";
    $q=mysqli_query($conn,$sql);
    $r=mysqli_fetch_assoc($q);
    $subjectname=$r['subject'];
    if(!file_exists('../../QuestionPaper/'.$streamname.'/'.$semname.'/'.$subjectname)){
        mkdir('../../QuestionPaper/'.$streamname.'/'.$semname.'/'.$subjectname, 0777, true);
    }
    $year = $_POST['year'];
    // if(!file_exists('../../QuestionPaper/'.$streamname.'/'.$semname.'/'.$subjectname.'/'.$year)){
    //     mkdir('../../QuestionPaper/'.$streamname.'/'.$semname.'/'.$subjectname.'/'.$year, 0777, true);
    // }

    // Start upload File
        $qp = $_FILES['question_file'];
        $file_name = $_FILES['question_file']['name'];
        $e=pathinfo($file_name,PATHINFO_EXTENSION);
        $file_name=$year.'_'.$subjectname.'.'.$e;
        // $tmp_name = $qp['tmp_name'];
        // $destination = "QuestionPaper/" . $file_name;
        $destination='../../QuestionPaper/'.$streamname.'/'.$semname.'/'.$subjectname.'/'.$file_name;
        // echo $destination;
    // End upload File

    $sql = "select * from q_paper where question_paper='$destination'";
    $q = mysqli_query($conn,$sql);
    $r = mysqli_fetch_assoc($q);
    if(mysqli_num_rows($q)!=0){
        echo"<script>alert('Already Exists')
        location.replace('yearpaper.php')
        </script>";
    }else
    if(mysqli_num_rows($q)==0){

    $query = "INSERT INTO `q_paper`(`teacher_id`, `stream`, `semester`, `subject`, `year`, `question_paper`) VALUES ('$my_id','$stream','$semester','$subject','$year','$destination')";

    $run_query = mysqli_query($conn,$query);

    if($run_query){
        // move_uploaded_file($tmp_name, $destination);
        move_uploaded_file($_FILES['question_file']['tmp_name'], $destination);

        echo"<script>alert('File Uploaded')
        location.replace('yearpaper.php')
        </script>";
    }else{
        echo"<script>alert('Fail to Upload')
        location.replace('yearpaper.php')
        </script>";
    }
}
}
?>