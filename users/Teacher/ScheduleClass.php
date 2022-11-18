<?php
session_start();
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
    <title>Schedule Class</title>
    <link rel="shortcut icon" href="../../images/logo.png" />

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=El+Messiri&family=Great+Vibes&family=Raleway:wght@300&display=swap" rel="stylesheet">
    <style>
    @media only screen and (max-width: 400px){
        .sc-header-logo{
    /* border: 2px solid blue; */
    /* width: 100px; */
    transform: scale(0.6);
    }
    #change-scheduleclass{
        margin-top:200px;
        /* background:yellow; */
    }
    .SC-form-container{
        margin-top:-100px;
    }
    }
    .action{
        z-index: 99;
    }
    
    </style>
</head>
<body class="bg-logo">
    <?php
   if($_SESSION['login'] && $_SESSION['teacher']){
    ?>

    

    <div class="home">
    
        <div class="topdesign" >
            
        </div>
        
        <div class="action" >
            <div class="profile" onclick="toggle();">
                <img src="<?php echo '../../registration/'.$_SESSION['user']['photo']; ?>" alt="">
            </div>
            <div class="menu">
                <h3><?php echo $_SESSION['user']['firstname'].' '.$_SESSION['user']['midname'].' '.$_SESSION['user']['lastname']; ?> <br>
                <span>Teacher</span>
                </h3>
                <ul>
                    <li><img src="images/user.png" alt=""><a href="index.php">Dashboard</a></li>
                    <li><img src="images/user.png" alt=""><a href="Profile.php">Profile</a></li>
                    <li><img src="images/schedule.png" alt=""><a onMouseOver="this.style.cursor='pointer'" onclick="location.reload();">Schedule Class</a></li>
                    <li><img src="images/edit.png" alt=""><a  href="UploadNotes.php">Upload Notes</a></li>
                    <li><img src="images/envelope.png" alt=""><a href="Updates.php">Updates</a></li>
                    <li><img src="images/edit.png" alt=""><a href="yearpaper.php">Year Paper</a></li>
                    <li><a href="../../logout.php"><img src="images/log-out.png" alt="">Logout</a></li>
                </ul>
            </div>
        <div class="sc-header" style="background:transparent; ">
      <div class="sc-header-logo">
        <a href="index.php" ><img  src="../../images/logo.png" alt="TihCollegeSpace"></a>
      </div>
      <div class="sc-header-name">
        <a href="index.php" ><h2 >TIH College Space</h2></a>
      </div>
  </div>
    
<section class="page-container">
        <section class="page-content">
            <div id="change-scheduleclass">
                <?php include 'scheduleclasslist.php' ?>
            </div>
            <div style="height:100px; width:100%;">

            </div>
        </section>
    </section>

        </div>
        
    </div>

    
    <!-- <div class="back">
      <h2><a href="index.php">Go to Database</a></h2>
    </div> 
    
    <div class="sc-header">
      <div class="sc-header-logo">
        <a href="index.php"><img src="../../images/logo.png" alt="TihCollegeSpace"></a>
      </div>
      <div class="sc-header-name">
        <a href="index.php"><h2>TIH College Space</h2></a>
      </div>
    </div>

    <div id="change-scheduleclass">
      <?php include 'scheduleclasslist.php'; ?>
    </div>
    
-->
    

    <script>
      window.onscroll = function() {myFunction()};

var navbar = document.getElementById("navbar");
var sticky = navbar.offsetTop;

function myFunction() {
  if (window.pageYOffset >= sticky) {
    navbar.classList.add("sticky")
  } else {
    navbar.classList.remove("sticky");
  }
}
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
        });
    </script>






    <script src="admin.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <?php
    }
    else{
    header("location:../../index.html");
    }
    ?>
</body>
</html>