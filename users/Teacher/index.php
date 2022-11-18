<?php
session_start();
include 'connection.php';
$date=date_create(date("Y-m-d"));
date_add($date,date_interval_create_from_date_string("-2 days"));
$dateupto=date_format($date,"Y-m-d");
$q = "SELECT * FROM updates where date>='$dateupto' order by date desc,time desc";
$r = mysqli_query($conn,$q);
$count=mysqli_num_rows($r);
$id=$_SESSION['user']['unique_id'];
$classes="select * from schedule_class where faculty_id='$id'";
$notes="select * from upload_notes where faculty_id='$id'";
$updates="select * from updates";
$q_paper="select * from q_paper";
$total_class = mysqli_query($conn, $classes);
$total_note = mysqli_query($conn, $notes);
$total_update = mysqli_query($conn, $updates);
$total_paper = mysqli_query($conn, $q_paper);
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
    <link rel="stylesheet" type="" href="../admin/dash.css">
    <link rel="stylesheet" type="" href="../admin/dashboard1.css">
    <title><?php echo $_SESSION['user']['firstname'].' Dashboard'; ?></title>
    <link rel="shortcut icon" href="../../images/logo.png" />
    

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=El+Messiri&family=Great+Vibes&family=Raleway:wght@300&display=swap" rel="stylesheet">
    
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <style> 
        section .right a{
            text-decoration:none;
            
        }
        .right::-webkit-scrollbar {
    display: none;
}
section{
    margin-bottom:10px;
}

/* Hide scrollbar for IE, Edge and Firefox */
.right {
    
  -ms-overflow-style: none;  /* IE and Edge */
  scrollbar-width: none;  /* Firefox */
}
.right a:hover{
    transform:scale(1.1);
}
    </style>
</head>
<body>
<?php
  if($_SESSION['login'] && $_SESSION['teacher']){
  include 'connection.php';
  $query = "SELECT * FROM streams";
  $result = mysqli_query($conn,$query);
?>

  <div class="sc-header" style="background:transparent;">
      <div class="sc-header-logo">
        <a  ><img onMouseOver="this.style.cursor='pointer'" onclick="location.reload();" src="../../images/logo.png" alt="TihCollegeSpace"></a>
      </div>
      <div class="sc-header-name">
        <a  ><h2 onMouseOver="this.style.cursor='pointer'" onclick="location.reload();">TIH College Space</h2></a>
      </div>
  </div>

    <div class="home">
        <div class="topdesign" >
        <!--<h4 class="teh"><strong>Hello, <?php echo $_SESSION['user']['firstname']; ?></strong><br>This is Dashboard.</h4>-->
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
                    <li><img src="images/user.png" alt=""><a onMouseOver="this.style.cursor='pointer'" onclick="location.reload();">Dashboard</a></li>
                    <li><img src="images/user.png" alt=""><a href="Profile.php">Profile</a></li>
                    <li><img src="images/schedule.png" alt=""><a href="ScheduleClass.php">Schedule Class</a></li>
                    <li><img src="images/edit.png" alt=""><a  href="UploadNotes.php">Upload Notes</a></li>
                    <li><img src="images/envelope.png" alt=""><a href="Updates.php">Updates</a></li>
                    <li><img src="images/edit.png" alt=""><a href="yearpaper.php">Year Paper</a></li>
                    <li><a href="../../logout.php"><img src="images/log-out.png" alt="">Logout</a></li>
                </ul>
            </div>
            <section>
                <div class="right">
                
                
                    <a href="ScheduleClass.php" class="active">
                        <div id="home">
                            <div class="elem">
                                <i class="fa fa-users" aria-hidden="true"></i>
                                <div class="num">
                                
                                    <div class="wrapper1">
                                        <?php echo "<b>".mysqli_num_rows($total_class)."</b>";?>
                                    </div>
                                    <p>Total</p>
                                </div>
                            </div>
                            <div class="box1">
                                <p>Classes Scheduled</p>
                            </div>
                        </div>
                    </a>
                    <a href="UploadNotes.php" class="active">
                        <div id="home">
                            <div class="elem">
                                <i class="fas fa-book" aria-hidden="true"></i>
                                <div class="num">
                                
                                    <div class="wrapper1">
                                         <?php echo "<b>".mysqli_num_rows($total_note)."</b>";?>
                                    </div>
                                    <p>Total</p>
                                </div>
                            </div>
                            <div class="box1">
                                <p>Notes Uploaded</p>
                            </div>
                        </div>
                    </a>
                    <a href="Updates.php"  class="active">
                        <div id="home">
                            <div class="elem">
                                <i class="fas fa-bell" aria-hidden="true"></i>
                                <div class="num">
                                
                                    <div class="wrapper1">
                                         <?php echo "<b>".mysqli_num_rows($total_update)."</b>";?>
                                    </div>
                                    <p>Total</p>
                                </div>
                            </div>
                            <div class="box1">
                                <p>Updates</p>
                            </div>
                        </div>
                    </a>
                    <a href="yearpaper.php" class="active">
                        <div id="home">
                            <div class="elem">
                                <i class="far fa-folder-open" aria-hidden="true"></i>
                                <div class="num">
                                
                                    <div class="wrapper1">
                                        <span class="box forth-number"></span>
                                        <span class="box third-number"></span>
                                        <span class="box second-number"></span>
                                        <span class="box first-number"></span>
                                    </div>
                                    <p>Total</p>
                                </div>
                            </div>
                            <div class="box1">
                                <p>Year Paper Available</p>
                            </div>
                        </div>
                    </a>
                </div>
                
            </section>
    


        </div>
        
    </div>
    <?php
    if($count!=0){
        ?>
    <footer class="footer">
            <div class="title" style="min-width:150px;">Recent Updates : </div>
            <marquee behavior="scroll" direction="left" scrolldelay="10" height="100px;" width="100%;" onmouseover="this.stop();" onmouseout="this.start();">
            <div class="marquee-flex">
                <?php
                    $i=0;
                    while($row=mysqli_fetch_assoc($r)){
                        $i=$i+1;
                ?>
                <?php if($i!=1){
                        ?>
                <div class="notification-row" data-role="view" style="border-left: 2px solid white;" data-id="<?php echo $row['id']; ?>">                    
                    <div class="title" id="view-notification"  ><?php echo $row['title']; ?></div>
                    
                </div>
                <?php 
                        }
                        else{
                        ?>
                <div class="notification-row" data-role="view" data-id="<?php echo $row['id']; ?>">
                    <div class="title" id="view-notification"  ><?php echo $row['title']; ?></div>
                    
                </div>
                <?php 
                        }
                        ?>
                        
                <?php
                    }
                ?>
            </div>
            </marquee>
        </footer>
        <?php
    }
    ?>
    <!-- Notification Bar -->

    <!-- Dashboard -->
    <!--Footer Modal-->
    <div class="modal fade" id="Footer_Modal"role="dialog" tabindex="-1">
    <?php include 'updatesmodal.php' ?>
             <!--    <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">      
                            <h3 class="modal-title">Notice</h3>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                        </div>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>-->
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