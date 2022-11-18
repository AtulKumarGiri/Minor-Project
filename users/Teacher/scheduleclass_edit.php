<?php
session_start();

if($_SESSION['login'] && $_SESSION['teacher']){


include 'connection.php';
$query="SELECT * FROM streams";
$result=mysqli_query($conn,$query);
$viewid=$_POST['viewid'];
$a = "SELECT * FROM schedule_class WHERE id='$viewid'";
$b = mysqli_query($conn,$a);
$res = mysqli_fetch_assoc($b);

// $subjectname=$res['subject'];
// $sem_id_sql="select * from subjects where subject='$subjectname'";
// $sem_id_query=mysqli_query($conn,$sem_id_sql);
// $sem_id_res=mysqli_fetch_assoc($sem_id_query);
// $sem_id=$sem_id_res['semesters_id'];
// $subjectid=$sem_id_res['id'];

// $showsubjectsql="select * from subjects where semesters_id='$sem_id'";
// $showsubjectquery=mysqli_query($conn,$showsubjectsql);
// $showsubject=$sem_id_query->fetch_assoc();



?>



<html>
<body>  
<head>
<link rel="stylesheet" href="scheduleclassform.css">
</head>  
<div class="sc-heading">
      <div class="sc-heading-part">
        <button type="button" class="btn btn-success btn-lg btn-block" id="sc-list" onclick="ScheduleList()">List of Classes</button>
      </div>
      <div class="sc-heading-part">
        <button type="button" class="btn btn-success btn-lg btn-block" id="sc-new" onclick="ScheduleNew()">New Class</button>
      </div>
</div>


    <form method="post" action="scheduleclass_update.php?viewid=<?php echo $viewid;?>">
                    <div class="wrapper">
                       
                        <div class="form">
                            <div id="Student_details"> 
                                <div class="input_field">
                                    <label>Stream :</label>
                                   <input class="form-control"  type="text" value="<?php echo $res['stream']; ?>" readonly>
                                
                                </div>
                                <div class="input_field">
                                <label>Section:</label>
                                <select class="form-control"  name="sectionSC" id="section"  required>
              <option value="<?php echo $res['section'] ?>"selected><?php echo $res['section'] ?></option>
              <?php if($res['section']!="Alpha"){ ?>
              <option value="Alpha">Alpha</option>
              <?php } if($res['section']!="Beta"){ ?>
              <option value="Beta">Beta</option>
              <?php } if($res['section']!="Combined"){ ?>
              <option value="Combined">Combined</option>
              <?php } ?>
            </select>
                                </div>
                                <div class="input_field">
                                <label>Semester:</label>
                                 <input class="form-control"  type="text" value="<?php echo $res['sem']; ?>" readonly>
                                </div>
                               
                                 <div class="input_field">
                                <label>Subject:</label>
                                 <input class="form-control"  type="text" value="<?php echo $res['subject']; ?>" readonly>
                                </div>
                               


                                <div class="input_field">
                                    <label>Date :</label>
                                    <input class="form-control"  class="form-control" placeholder="Date" type="date" value="<?php echo $res['date']; ?>" name="dateSC"  id="date_picker" required>
                                </div>
                                
                                <div class="input_field">
                                    <label>Time:</label>
                                 <input class="form-control"  type="time" name="timeSC"  id="time" value="<?php echo $res['time']; ?>" required>
                                </div>
                                <div class="input_field">
                                 <label>Topic Name:</label>
                              <input class="form-control"  type="text" name="topicSC"  id="topic" placeholder="Write the Topics" value="<?php echo $res['topic']; ?>" required>            
                                  </div>
                             <div class="input_field">
                                 <label>Class Link:</label>
                               <input class="form-control"  type="url" name="classlinkSC"  id="classlink" placeholder="Enter a valid url" value="<?php echo $res['classlink']; ?>">        
                                  </div>

                           
                            <div class="input_field">
                            <div class="form-row">
                <div style="margin-right:10px;"> <input class="btn btn-success" type="submit" name="submit" value="Update"></div>
            
             <div> <button type="button" class="btn btn-success" data-role="cancel" data-id="<?php echo $viewid; ?>" id="sc-cancel">Cancel</button></div>
             </div>
                            </div>
                        </div>
                    </div>
                </form>


</div>























    <script>
function FetchSemester(id){
    $('#semester').html('');
    $('#subject').html('<option>Select Subject</option>');
    $.ajax({
      type:'post',
      url: 'ajaxdata.php',
      data : { stream_id : id},
      success : function(data){
         $('#semester').html(data);
      }

    })
  }

  function FetchSubject(id){ 
    $('#subject').html('');
    $.ajax({
      type:'post',
      url: 'ajaxdata.php',
      data : { semester_id : id},
      success : function(data){
         $('#subject').html(data);
      }

    })
  }
      $(document).ready(function(){
        
            $('#sc-new').click(function(){
                // $.get('get.html',function(data,status){
                //     $('#changehere').html(data);
                //     alert(status);
                // });
                $.post('scheduleclassform.php',function(data,status){
                    $('#change-scheduleclass').html(data);
                })
            });
            $('#sc-list').click(function(){
                // $.get('get.html',function(data,status){
                //     $('#changehere').html(data);
                //     alert(status);
                // });
                $.post('scheduleclasslist.php',function(data,status){
                    $('#change-scheduleclass').html(data);
                })
            });
            $(document).on('click','button[data-role=cancel]',function(){
              // alert($(this).data('id'));
              var dataid=$(this).data('id');
              $.post('scheduleclassview.php',{
                viewid : dataid },
                function(data,status){
                    $('#change-scheduleclass').html(data);
                })
            });

        });
    </script>
    <?php
  }
else{
  header("location:../../index.html");
}
?>

  </body>
</html>