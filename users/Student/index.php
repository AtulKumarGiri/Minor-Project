<?php
session_start();
include 'connection.php';
$date=date_create(date("Y-m-d"));
date_add($date,date_interval_create_from_date_string("-2 days"));
$dateupto=date_format($date,"Y-m-d");
$q = "SELECT * FROM updates where date>='$dateupto' order by date desc,time desc";
$r = mysqli_query($conn,$q);
$count=mysqli_num_rows($r);


$stream=$_SESSION['user']['stream'];
$sem=$_SESSION['user']['semester'];
$section=$_SESSION['user']['section'];
$classes = "SELECT * FROM schedule_class where stream='$stream' and sem='$sem' and (section='$section' or section='Combined')  order by date";
$notes = "SELECT * FROM upload_notes where stream='$stream' and sem='$sem' and (section='$section' or section='Combined') order by date";
$updates= "SELECT * FROM updates order by id desc";
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
  <link rel="stylesheet" href="style_student.css">
    <link rel="stylesheet" href="../../css/schedule.css">
    <link rel="stylesheet" type="" href="style.css">
    <link rel="stylesheet" type="" href="../admin/dash.css">
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <!-- jQuery -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <link rel="stylesheet" href="../../css/Overlay.css">
  <title><?php echo $_SESSION['user']['firstname'].' Dashboard'; ?></title>
 <link rel="shortcut icon" href="../../images/logo.png" />
 <script src="https://kit.fontawesome.com/a076d05399.js"></script>
<style> 
body{
    position:fixed;
}
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

    .action{
        z-index: 99;
    }
</style>
    
</head>

<body>

  <?php
  if ($_SESSION['login'] && $_SESSION['student']) {
  ?>

    

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
                    <li><img src="images/user.png" alt=""><a href="profile.php">My Profile</a></li>
                    <li><img src="images/schedule.png" alt=""><a  href="classes.php">Classes</a></li>
                    <li><img src="images/envelope.png" alt=""><a   href="notes.php">Notes</a></li>
                    <li><img src="images/envelope.png" alt=""><a  href="paper.php">Year Papers</a></li>
                    <li><img src="images/envelope.png" alt=""><a  href="updates.php">Updates</a></li>
                    
                    <li><a href="../../logout.php"><img src="images/log-out.png" alt="">Logout</a></li>
                </ul>
            </div>
            <div class="sc-header" style="background:transparent; ">
        <div class="sc-header-logo">
            <a  ><img onMouseOver="this.style.cursor='pointer'" onclick="location.reload();"` src="../../images/logo.png" alt="TihCollegeSpace"></a>
        </div>
        <div class="sc-header-name">
            <a  ><h2 onMouseOver="this.style.cursor='pointer'" onclick="location.reload();">TIH College Space</h2></a>
        </div>
    </div>
                <section>
                        <div class="right">
                            <a href="classes.php" class="active">
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
                            <a href="notes.php" class="active">
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
                            <a href="updates.php"  class="active">
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
                            <a href="paper.php" class="active">
                                <div id="home">
                                    <div class="elem">
                                        <i class="far fa-folder-open" aria-hidden="true"></i>
                                        <div class="num">
                                        
                                            <div class="wrapper1">
                                            <?php echo "<b>".mysqli_num_rows($total_paper)."</b>";?>
                                            <!-- <span class="box forth-number"></span>
                                                <span class="box third-number"></span>
                                                <span class="box second-number"></span>
                                                <span class="box first-number"></span>-->
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
    
    <div class="modal fade align-items-center justify-content-center" id="Footer_Modal"role="dialog" tabindex="-1" aria-hidden="true" style="display:none;">
           <?php include 'updatesmodal.php' ?>
    </div>


  <!--
  <div class="home">
        <div class="topdesign" >
        <h4 class="teh"><strong>Hello, <?php echo $_SESSION['user']['firstname']; ?><br> This is Your Dashboard</strong></h4>
        </div>

        <div class="action">
            <div class="profile" onclick="toggle();">
                <img src="<?php echo '../../registration/'.$_SESSION['user']['photo']; ?>" alt="">
            </div>
            <div class="menu">
                <h3><?php echo $_SESSION['user']['firstname'].' '.$_SESSION['user']['midname'].' '.$_SESSION['user']['lastname']; ?> <br>
                <span>Student</span>
                </h3>
                <ul>
                    <li><img src="images/user.png" alt=""><a href="profile.php">My Profile</a></li>
                    <li><img src="images/schedule.png" alt=""><a  href="classes.php">Classes</a></li>
                    <li><img src="images/envelope.png" alt=""><a   href="notes.php">Notes</a></li>
                    <li><img src="images/envelope.png" alt=""><a  href="StudentPaper.php">Year Papers</a></li>
                    <li><img src="images/envelope.png" alt=""><a  href="updates.php">Updates</a></li>
                    
                    <li><a href="../../logout.php"><img src="images/log-out.png" alt="">Logout</a></li>
                </ul>
            </div>
        </div>
    </div>
    <?php
    if($count!=0){
        ?>
    <footer class="footer">
            <div class="title" style="min-width:140px; margin-left:5px; padding-left:5px;">Recent Updates : </div>
            <marquee behavior="scroll" direction="left" scrolldelay="10" height="100px;" width="100%;" onmouseover="this.stop();" onmouseout="this.start();">
            <div class="marquee-flex">
                <?php
                    $i=0;
                    while($row=mysqli_fetch_assoc($r)){
                        $i=$i+1;
                ?>
                <?php if($i!=1){
                        ?>
                <div class="notification-row" data-bs-toggle="modal" data-bs-target="#Footer_Modal" data-role="view" style="border-left: 2px solid white;" data-id="<?php echo $row['id']; ?>">                    
                    <div class="title" id="view-notification"  ><?php echo $row['title']; ?></div>
                    
                </div>
                <?php 
                        }
                        else{
                        ?>
                <div class="notification-row" data-bs-toggle="modal" data-bs-target="#Footer_Modal" data-role="view" data-id="<?php echo $row['id']; ?>">
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


    <div class="modal fade" id="Footer_Modal" tabindex="-1" aria-labelledby="SignupModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" id="change-footer-modal">
                  
                    
                </div>
              
            </div>
        </div>
    </div>-->



<!--
<div class="modal fade" id="Footer_Modal" role="dialog" tabindex="-1">
    <?php include 'updatesmodal.php' ?>
</div>
-->
    <!-- Adding Overlay -->
    <div id="overlay"></div>
    <script src="admin.js"></script>
    <script src="../../Javascripts/Overlay.js"></script>   
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script>

         $(document).ready(function(){
                     //footer_notice
            // $("#Footer_Modal").modal("hide");
           $(document).on('click','div[data-role=view]',function(){
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

            //     $(document).on('click','div[data-role=view]',function(){
            //   alert($(this).data('id'));
            //   var dataid=$(this).data('id');
            //   $.post('../Teacher/notice.php',{
            //     userid : dataid },
            //     function(data,status){
            //         $('#Footer_Modal').html(data);
            //     })
            // });
    </script>
  <?php
  } else {
    header("location:../../index.html");
  }
  ?>
</body>

</html>