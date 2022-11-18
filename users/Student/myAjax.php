<?php
include 'connection.php';
$semdata = $_POST['semdata'];
if($semdata == "semester")
{
 $id = $_POST['semid'];
 $semester = $conn->query("SELECT * FROM semesters WHERE streams_id='$id'");
 while ($sem = $semester->fetch_assoc()) 
 {
     $data[] = $sem;
 }
 echo json_encode($data);
}
else if($semdata == "subject")
{
 $id = $_POST['semid'];
 $semester = $conn->query("SELECT * FROM subjects WHERE semesters_id='$id'");
 while ($sem = $semester->fetch_assoc()) 
 {
     $data[] = $sem;
 }
 echo json_encode($data);
}

else if($semdata == "paper")
{
$course = $_POST['stream'];
$semester = $_POST['semester'];
$subject = $_POST['subject'];
$year = $_POST['year'];

$resultcourse = $conn->query("SELECT * FROM streams WHERE id='$course'")->fetch_assoc();
$coursename = $resultcourse['stream'];
$resultsemester = $conn->query("SELECT * FROM semesters WHERE id='$semester'")->fetch_assoc();

$semestername = $resultsemester['sem'];
$resultsubject = $conn->query("SELECT * FROM subjects WHERE id='$subject'")->fetch_assoc();

$subjectname = $resultsubject['subject'];
$result = $conn->query("SELECT * FROM q_paper WHERE stream='$course'and semester='$semester'and subject='$subject' and year='$year'");
//$result =  $conn->query("SELECT streams.stream,q_paper.question_paper,semesters.sem,subjects.subject FROM q_paper INNER JOIN subjects ON subjects.id=q_paper.subject INNER JOIN streams ON streams.id=q_paper.stream INNER JOIN semesters ON semesters.id=q_paper.semester WHERE streams.stream='$course' AND semesters.sem='$semester' AND subjects.subject='$subject' AND q_paper.year='$year'");
//$question_paper = $result['question_paper'];
if($result->num_rows > 0){
    $output ='';
    while($rc = $result->fetch_assoc()){

      $output .='
       <tr>
          <td>'.$coursename.'</td>
          <td>'.$semestername.'</td>
          <td>'.$subjectname.'</td>
          <td>'.$year.'</td>
          <td><a href="../Teacher/QuestionPaper/'.$rc['question_paper'].'" class="btn btn-info btn-sm" target="_blank">Download</a></td>
       <tr>
      ';
    }
echo json_encode(array(
    'success'=>true,
    'found'=>'Success',
    'data'=>$output
));
}
else{
  echo json_encode(array(
    'failed'=>false,
    'found'=>'Failed',
    'data'=>'<tr><td colspan="5" class="text-center text-danger">No Data Found</td></tr>'
));
}


// if(!empty($question_paper))
// {
//   echo json_encode(array("stream"=>$coursename,"sem"=>$semestername,"subject"=>$subjectname,"year"=>$year,"question_paper"=>$question_paper));
// }
// else
// {
//     echo json_encode(array('found'=>'Not found'));
// }

}
?>