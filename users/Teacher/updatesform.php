<?php
session_start();

if($_SESSION['login'] && $_SESSION['teacher']){


include 'connection.php';

$sql="select * from update_streams";
$result=mysqli_query($conn,$sql);

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link rel="stylesheet" href="scheduleclassform.css">
    <link rel="stylesheet" media="screen and (max-width:902px)" href="css/mobile.css">
    <title>Document</title>
</head>
<body>
<div class="sc-heading">
      <div class="sc-heading-part">
        <button type="button" class="btn btn-success btn-lg btn-block" id="updates-list">Updates</button>
      </div>
      <div class="sc-heading-part">
        <button type="button" class="btn btn-success btn-lg btn-block" id="updates-new" disabled >New Update</button>
      </div>
</div>

<div class="updates-form-container">


      <form action="updatesformdata.php" method="post" enctype="multipart/form-data">
                    <div class="wrapper">
                        
                        <div class="form">
                            <div id="Student_details"> 
                                <div class="input_field">
                                    <label>Stream :</label>
                                    <select class="form-control" name="stream" id="stream"  onchange="FetchYear(this.value)"  required>
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
                                <label>Stream Year :</label>
                                <select class="form-control" name="year" id="year" required>
              <option selected disabled>Select Year</option>
            </select>
                                </div>
                                <div class="input_field">
                                <label>Title :</label>
                                <input class="form-control" type="text" name="title"  id="title" placeholder="Write the Title" required>
                                </div>
                                <div class="input_field">
                                <label>Message :</label>
                                <textarea class="form-control" name="message" id="message"></textarea>
                                </div>
                                <div class="input_field">
                                    <label>File :</label>
                                   <input  class="form-control" type="file" name="documentname[]" id="document" multiple  >  
                                    
         
                                </div>
                                
                                
                            
                            <div class="input_field">
                            <div class="form-row">
        <div style="margin-right:10px;"><input  type="submit"  class="btn btn-success"  value="Update">div>
            
        <div><input class="btn btn-primary mb-3" type="reset" value="Clear Entries"></div>
        </div>
                            </div>
                        </div>
                    </div>
                </form>
</div>




<script>
    $(document).ready(function(){
        $('#updates-list').click(function(){
            // $.get('get.html',function(data,status){
            //     $('#changehere').html(data);
            //     alert(status);
            // });
            $.post('updateslist.php',function(data,status){
                $('#change-updates').html(data);
            })
        });
    });

    function FetchYear(id){
        $('#year').html('');
        $.ajax({
        type:'post',
        url: 'ajaxdata.php',
        data : { year_id : id},
        success : function(data){
            $('#year').html(data);
        }

        });
    }

</script>
<?php
  }
else{
  header("location:../../index.html");
}
?>
</body>
</html>