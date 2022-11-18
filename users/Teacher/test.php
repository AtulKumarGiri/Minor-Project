<?php
session_start();
include 'connection.php';
$date=date_create(date("Y-m-d"));
date_add($date,date_interval_create_from_date_string("-2 days"));
$dateupto=date_format($date,"Y-m-d");
$q = "SELECT * FROM updates where date>='$dateupto' order by date desc,time desc";
$r = mysqli_query($conn,$q);
$count=mysqli_num_rows($r);

$student = "SELECT * from `student`";
$teachers = "SELECT * from `teacher`";
$inbox = "SELECT * from `message`";
$total_s = mysqli_query($conn, $student);
$total_t = mysqli_query($conn, $teachers);
$total_i = mysqli_query($conn, $inbox);
$total_u = $total_t + $total_s;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style_teacher2.css">
    <link rel="stylesheet" href="../../css/Overlay.css">
    <link rel="stylesheet" href="../../css/schedule.css">
    <link rel="stylesheet" type="" href="style.css">
    <title><?php echo $_SESSION['user']['firstname'].' Dashboard'; ?></title>
    <link rel="shortcut icon" href="../../images/logo.png" />

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=El+Messiri&family=Great+Vibes&family=Raleway:wght@300&display=swap" rel="stylesheet">
    
    
</head>
<body>
<?php
  if($_SESSION['login'] && $_SESSION['teacher']){
  include 'connection.php';
  $query = "SELECT * FROM streams";
  $result = mysqli_query($conn,$query);
?>
    <div class="home">
        <div class="topdesign" >
        <h4 class="teh"><strong>Hello, <?php echo $_SESSION['user']['firstname']; ?></strong><br>This is Dashboard.</h4>
        </div>
        <!--
        <div class="sc-header">
      <div class="sc-header-logo">
        <a href="index.php"><img src="../../images/logo.png" alt="TihCollegeSpace"></a>
      </div>
      <div class="sc-header-name">
        <a href="index.php"><h2>TIH College Space</h2></a>
      </div>
      
    </div>
    -->
        <div class="action">
            <div class="profile" onclick="toggle();">
                <!-- <img src="images/RajendraKumarShaw.jpg" alt=""> -->
                <img src="<?php echo '../../registration/'.$_SESSION['user']['photo']; ?>" alt="">
            </div>
            <div class="menu">
                <h3><?php echo $_SESSION['user']['firstname'].' '.$_SESSION['user']['midname'].' '.$_SESSION['user']['lastname']; ?> <br>
                <span>Teacher</span>
                </h3>
                <ul>
                    <li><img src="images/user.png" alt=""><a href="Profile.php">Profile</a></li>
                    <li><img src="images/schedule.png" alt=""><a href="ScheduleClass.php">Schedule Class</a></li>
                    <li><img src="images/edit.png" alt=""><a  href="UploadNotes.php">Upload Notes</a></li>
                    <li><img src="images/envelope.png" alt=""><a href="Updates.php">Updates</a></li>
                    <li><img src="images/edit.png" alt=""><a href="yearpaper.php">Year Paper</a></li>
                    <li><a href="../../logout.php"><img src="images/log-out.png" alt="">Logout</a></li>
                </ul>
            </div>
            <div class="section">

      <?php include 'scheduleclasslist.php'; ?>
            </div>
        </div>
        
    </div>
    
    

    <!--/Footer Modal-->


    <!-- Adding Overlay -->
    <div id="overlay"></div>
    
    <script src="admin.js"></script>
    <script src="../../Javascripts/Overlay.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script type="text/javascript">
    $('#exampleModal').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) // Button that triggered the modal
  var recipient = button.data('whatever') // Extract info from data-* attributes
  // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
  // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
  var modal = $(this)
  modal.find('.modal-title').text('New message to ' + recipient)
  modal.find('.modal-body input').val(recipient)
})
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

      function FetchSemesterYP(id){
        $('#semesterYP').html('');
        $('#subjectYP').html('<option>Select Subject</option>');
        $.ajax({
          type:'post',
          url: 'ajaxdata.php',
          data : { stream_id : id},
          success : function(data){
            $('#semesterYP').html(data);
          }

        })
      }

      function FetchSubjectYP(id){ 
        $('#subjectYP').html('');
        $.ajax({
          type:'post',
          url: 'ajaxdata.php',
          data : { semester_id : id},
          success : function(data){
            $('#subjectYP').html(data);
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
        $(document).on('click','a[data-role=ScheduleClass]',function(){
          $.post('test.php',
            function(data,status){
                $('#dashboard').html(data);
            })
          });
          $('#sc-new').click(function(){
            $.post('scheduleclassform.php',function(data,status){
                $('#change-scheduleclass').html(data);
            })
          });
          $('#sc-list').click(function(){
            $.post('scheduleclasslist.php',function(data,status){
                $('#change-scheduleclass').html(data);
            })
          });
        $('#un-new').click(function(){
          $.post('uploadnotesform.php',function(data,status){
              $('#change-uploadnotes').html(data);
          })
        });
        $('#un-list').click(function(){
          $.post('uploadnoteslist.php',function(data,status){
              $('#change-uploadnotes').html(data);
          })
        });
          $('#yp-new').click(function(){
            $.post('UploadQuestion.php',function(data,status){
                $('#change-papers').html(data);
            })
          });
          $('#yp-list').click(function(){
            $.post('yearpaperlist.php',function(data,status){
                $('#change-yearpaper').html(data);
            })
          });
          //footer_notice
           $(document).on('click','[data-role=view]',function(){
                    var userid = $(this).data('id');
                    // alert(userid);
                    $.ajax({
                        url: 'notice.php',
                        type: 'post',
                        data: {userid: userid},
                        success: function(response){ 
                            $('.modal-body').html(response); 
                            $('#Footer_Modal').modal('show'); 
                        }
                    });
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