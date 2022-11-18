<?php
session_start();
if($_SESSION['login'] && $_SESSION['teacher']){

include 'connection.php';
$query = "SELECT * FROM streams";
$result = mysqli_query($conn,$query);
?>
<html>
  <head>
    <link rel="stylesheet" href="scheduleclassform.css">
    <link rel="stylesheet" media="screen and (max-width:902px)" href="css/mobile.css">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

      <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <style>
        @media only screen and (max-width: 400px){
    .sc-header-logo{
    /* border: 2px solid blue; */
    /* width: 100px; */
    transform: scale(0.6);
    }
    .sc-heading{
        flex-direction: column;
    }
    .sc-heading-part{
        width: 90%;
    }
    #change-scheduleclass{
    /* position: fixed; */
    /* margin-top:200px; */
    /* margin-top: 0px; */
    /* height: 500px; */
    /* overflow-y: scroll; */
    /* border: 2px solid red; */
    /* background: red; */
    margin-top: 100px;
}
}

    </style>
</head>
<body> 
 
<div class="sc-heading">
      <div class="sc-heading-part">
        <button type="button" class="btn btn-success btn-lg btn-block" id="sc-list" onclick="ScheduleList()">List of Classes</button>
      </div>
      <div class="sc-heading-part">
        <button type="button" class="btn btn-success btn-lg btn-block" id="sc-new" onclick="ScheduleNew()" disabled>New Class</button>
      </div>
</div>

    <form name="scheduleclass-form" action="scheduleclassformdata.php"  method="post">
                    <div class="wrapper">
                       
                        <div class="form">
                            <div id="Student_details"> 
                                <div class="input_field">
                                    <label>Select Stream:</label>
                                    <select name="streamSC" class="form-control" placeholder="Select Stream" id="stream"  onchange="FetchSemester(this.value)"  required>
              <option selected disabled>Select Stream</option>
            <?php
              if (mysqli_num_rows($result) > 0 ) {
                while ($row = mysqli_fetch_assoc($result)) {
                  echo '<option value='.$row['id'].'>'.$row['stream'].'</option>';
                }
              }
            ?> 
            </select>
                                
                                </div>
                                <div class="input_field">
                                <label>Select Semester:</label>
                                <select class="form-control" placeholder="Select Semester" name="semesterSC" id="semester"  onchange="FetchSubject(this.value)"  required>
              <option selected disabled>Select Semester</option>
            </select>
                                </div>
                                <div class="input_field">
                                <label>Select Section:</label>
            <select  class="form-control" placeholder="Select Section" name="sectionSC" id="section"  required>
              <option selected disabled>Select Section</option>
              <option value="Alpha">Alpha</option>
              <option value="Beta">Beta</option>
              <option value="Combined">Combined</option>
            </select>
                                </div>
                                <div class="input_field">
                                <label>Select Subject:</label>
                                <select class="form-control" placeholder="Select Subject" name="subjectSC" id="subject"  required>
                                        <option selected disabled>Select Subject</option>
                                </select>
                                </div>
                                <div class="input_field">
                                    <label>Time:</label>
                                   
         <input  class="form-control" placeholder="Time"  type="time" name="timeSC"  id="time" >
         
                                </div>
                                
                                <div class="input_field">
                                    <label>Date:</label>
                                    <input  class="form-control" placeholder="Date" type="date" name="dateSC"  id="date_picker" required>
                                </div>
                                
                                <div class="input_field">
                                  
                                    
                                <input   class="form-control" type="text" name="topicSC"  id="topic" placeholder="Write the Topics" required>
           
                                    
                                </div>
                                <div class="input_field">
                                  

                            <input  class="form-control" type="url" name="classlinkSC"  id="classlink" placeholder="Enter a valid url">                
                                  </div>
                             
                            
                            <div class="input_field">
                            <div class="form-row">
                <div style="margin-right:10px;"><input class="btn btn-success mb-3" type="submit" value="Schedule Class" ></div>
            
             <div><input class="btn btn-success mb-3" type="reset" value="Clear Entries"></div>
             </div>
                            </div>
                        </div>
                    </div>
                </form>


</div>


    </div>
    <script>
      function FetchSemester(id){
    $('#semester').html('<option>Loading Semesters</option>');
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
    $('#subject').html('<option>Loading Subjects</option>');
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
        });
    </script>
    <!-- DATE PICKER -->
<script language="javascript">
        var today = new Date();
        var dd = String(today.getDate()).padStart(2, '0');
        var mm = String(today.getMonth() + 1).padStart(2, '0');
        var yyyy = today.getFullYear();

        today = yyyy + '-' + mm + '-' + dd;
        $('#date_picker').attr('min',today);
    </script>
<?php
  }
else{
  header("location:../../index.html");
}
?>
  </body>
</html>