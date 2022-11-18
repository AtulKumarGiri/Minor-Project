<?php
session_start();

if($_SESSION['login'] && $_SESSION['teacher']){

        include 'connection.php';
        $query = "SELECT * FROM streams";
        $result = mysqli_query($conn,$query);
      ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="scheduleclassform.css">
    <link rel="stylesheet" media="screen and (max-width:902px)" href="css/mobile1.css">


    <title>Document</title>
</head>
<body>
<div class="sc-heading">
      <div class="sc-heading-part">
        <button type="button" class="btn btn-success btn-lg btn-block" id="un-list">See Notes</button>
      </div>
      <div class="sc-heading-part">
        <button type="button" class="btn btn-success btn-lg btn-block" id="un-new" disabled>New Note</button>
      </div>
</div>



<form action="uploadnotesformdata.php" method="post" enctype="multipart/form-data">
                    <div class="wrapper">
                       
                        <div class="form">
                            <div id="Student_details"> 
                                <div class="input_field">
                                    <label>Stream:</label>
                                    <select  class="form-control" name="streamUN" id="streamUN"  onchange="FetchSemesterUN(this.value)"  required>
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
                                <label>Stream Semester:</label>
                                <select  class="form-control" name="semesterUN" id="semesterUN"  onchange="FetchSubjectUN(this.value)"  required>
              <option selected disabled>Select Semester</option>
            </select>
                                </div>
                                <div class="input_field">
                                <label>Select Section:</label>
                                <select  class="form-control" name="sectionUN" id="sectionUN"  required>
              <option selected disabled>Select Section</option>
              <option value="Alpha">Alpha</option>
              <option value="Beta">Beta</option>
              <option value="Combined">Combined</option>
            </select>
            </div>
                                </div>
                                <div class="input_field">
                                <label>Select Subject:</label>
                                <select  class="form-control" class="form-control" name="subjectUN" id="subjectUN"  required>
              <option selected disabled>Select Subject</option>
            </select>
                                </div>
                              
                                
                                <div class="input_field">
                                    <label>Date of class:</label>
                                    <input  class="form-control" class="form-control" type="date" name="dateUN"  id="dateUN" required> </div>
                                
                                <div class="input_field">
                                  
                                    
                                <input  class="form-control"  class="form-control" type="text" name="topicSC"  id="topic" placeholder="Write the Topics" required>
           
                                    
                                </div>
                                <div class="input_field">
                                <label>Study Materials:</label>

                                <input  class="form-control" type="file" name="fileUN[]" id="fileUN" multiple  >              
                                  </div>
                             

                                  <div class="input_field">
                                <label>Topic Names:</label>
                                <input  class="form-control" type="text" name="topicUN"  id="topicUN" placeholder="Write the Topics" required>
                                       
                                  </div>


                            <div class="input_field">
                            <div class="form-row">
                        <div style="margin-right:10px; margin-bottom:10px;"> <input class="btn btn-success" type="submit" value="Upload Notes"></div>
            
                     <div style="margin-bottom:10px;">    <input class="btn btn-success" type="reset" value="Clear Entries"></div>
                             </div>
                            </div>
                        </div>
                    </div>
                </form>


    <script>
        function FetchSemesterUN(id){
    $('#semesterUN').html('');
    $('#subjectUN').html('<option>Select Subject</option>');
    $.ajax({
      type:'post',
      url: 'ajaxdata.php',
      data : { stream_id : id},
      success : function(data){
         $('#semesterUN').html(data);
      }

    })
  }

  function FetchSubjectUN(id){ 
    $('#subjectUN').html('');
    $.ajax({
      type:'post',
      url: 'ajaxdata.php',
      data : { semester_id : id},
      success : function(data){
         $('#subjectUN').html(data);
      }

    })
  }
  updateList = function() {
    var input = document.getElementById('file');
    var output = document.getElementById('fileList');
    var children = "";
    for (var i = 0; i < input.files.length; ++i) {
        children += '<li>' + input.files.item(i).name + '</li>';
    }
    output.innerHTML = '<ul>'+children+'</ul>';
}
      $(document).ready(function(){
        $('#un-new').click(function(){
                // $.get('get.html',function(data,status){
                //     $('#changehere').html(data);
                //     alert(status);
                // });
                $.post('uploadnotesform.php',function(data,status){
                    $('#change-uploadnotes').html(data);
                })
            });
            $('#un-list').click(function(){
                // $.get('get.html',function(data,status){
                //     $('#changehere').html(data);
                //     alert(status);
                // });
                $.post('uploadnoteslist.php',function(data,status){
                    $('#change-uploadnotes').html(data);
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