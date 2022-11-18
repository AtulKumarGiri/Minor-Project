<?php
session_start();

if($_SESSION['login'] && $_SESSION['teacher']){
    

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
    <link rel="stylesheet" href="style_teacher2.css">
    <title><?php echo $_SESSION['user']['firstname'];?> Profile</title>
    <link rel="shortcut icon" href="../../images/logo.png" />

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=El+Messiri&family=Great+Vibes&family=Raleway:wght@300&display=swap" rel="stylesheet">
    <style>
    .action{
        z-index: 99;
    }
    .modalCenter{
    top:50% !important;
    transform: translateY(-50%) !important;
    }

    </style>
</head>
<body>


    <div class="home">
    
        <div class="topdesign" >
            
        </div>
        
        <div class="action">
            <div class="profile" onclick="toggle();">
                <img src="<?php echo '../../registration/'.$_SESSION['user']['photo']; ?>" alt="">
            </div>
            <div class="menu">
                <h3><?php echo $_SESSION['user']['firstname'].' '.$_SESSION['user']['midname'].' '.$_SESSION['user']['lastname']; ?> <br>
                <span>Teacher</span>
                </h3>
                <ul>
                    <li><img src="images/user.png" alt=""><a href="index.php">Dashboard</a></li>
                    <li><img src="images/user.png" alt=""><a onMouseOver="this.style.cursor='pointer'" onclick="location.reload();">Profile</a></li>
                    <li><img src="images/schedule.png" alt=""><a href="ScheduleClass.php">Schedule Class</a></li>
                    <li><img src="images/edit.png" alt=""><a  href="UploadNotes.php">Upload Notes</a></li>
                    <li><img src="images/envelope.png" alt=""><a href="Updates.php">Updates</a></li>
                    <li><img src="images/edit.png" alt=""><a href="yearpaper.php">Year Paper</a></li>
                    <li><a href="../../logout.php"><img src="images/log-out.png" alt="">Logout</a></li>
                </ul>
            </div>

            <div class="sc-header" style="background:transparent;  ">
      <div class="sc-header-logo">
        <a href="index.php" ><img  src="../../images/logo.png" alt="TihCollegeSpace"></a>
      </div>
      <div class="sc-header-name">
        <a href="index.php" ><h2>TIH College Space</h2></a>
      </div>
  </div>
        
            <section class="page-container">
        <section class="page-content">
            <div id="change-profile" style="background:transparent;">
    <div class="profile-row-img">
        <img src="<?php echo '../../registration/'.$_SESSION['user']['photo']; ?>" alt="Image">
        <h1><?php echo $_SESSION['user']['firstname'].' '.$_SESSION['user']['midname'].' '.$_SESSION['user']['lastname']; ?></h1>
    </div>
    
    <div class="profile-row">
        <div class="profile-row-left">
            <div class="profile-row-left-box">
                Unique Id
            </div>
        </div>
        <div class="profile-row-right">
            <?php echo $_SESSION['user']['unique_id'];?>
        </div>
    </div>
    <div class="profile-row">
        <div class="profile-row-left">
            <div class="profile-row-left-box">
                Date of Birth
            </div>
        </div>
        <div class="profile-row-right">
            <?php $originalDate=$_SESSION['user']['dob'];
$newDate = date("d-m-Y", strtotime($originalDate)); echo $newDate;?>
        </div>
    </div>
    <div class="profile-row">
        <div class="profile-row-left">
            <div class="profile-row-left-box">
                Gender
            </div>
        </div>
        <div class="profile-row-right">
            <?php echo ucfirst($_SESSION['user']['gender']);?>
        </div>
    </div>
    <div class="profile-row">
        <div class="profile-row-left">
            <div class="profile-row-left-box">
                Contact No
            </div>
        </div>
        <div class="profile-row-right">
            <?php echo $_SESSION['user']['phone'];?>
        </div>
    </div>
    <div class="profile-row">
        <div class="profile-row-left">
            <div class="profile-row-left-box">
                Email Id
            </div>
        </div>
        <div class="profile-row-right">
            <?php echo $_SESSION['user']['email'];?>
        </div>
    </div>
    <div class="profile-row" style="display:flex;flex-direction:column;">
        <div>
        <a style="text-decoration:none; color:white;" href="edit-profile.php?id=<?php echo $_SESSION['user']['unique_id'];?>"><button class="btn btn-success">Edit Profile</button></a>
        </div>
        <div>
            <a style="text-decoration:none; color:white;" ><button class="btn btn-success"  data-bs-toggle="modal" data-bs-target="#myModal">Change Password</button></a>
        </div>
    </div>

        </div>
            <div style="height:100px; width:100%;">

            </div>
        </section>
    </section>


        </div>
        
    </div>

<!--Modal Changed Password-->

<div class="modal" id="myModal">
  <div class="modal-dialog modalCenter">
    <div class="modal-content">
    <form action="change-password.php" method="post">
      <!-- Modal Header -->
      <div class="modal-header">
        <h3 class="modal-title">Change Password</h3>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <div class="password ">
            <label for="password"> Current Password :</label>
            <input type="password" class="form-control" name="cp">
        </div>
         <div class="password">
            <label for="password">New Password :</label>
            <input type="password" class="form-control" name="np">
        </div>

        <div class="password_confirm">
            <label for="password_confirmation">Password confirmation :</label>
            <input type="password" class="form-control" id="myInput" name="rnp">
            <input type="checkbox" onclick="myFunction()">Show Password
        </div>
      </div>
     

      <!-- Modal footer -->
      <div class="modal-footer">
       <div class="submit">
            <input type="submit" class="btn btn-primary" name="reset" value="Change password">
        </div>
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
      </div>
 </div>
    </form>
    </div>
  </div>
</div>
<!--Modal Changed Password>
<!--
<div class="sc-header">
      <div class="sc-header-logo">
        <a href="index.php"><img src="../../images/logo.png" alt="TihCollegeSpace"></a>
      </div>
      <div class="sc-header-name">
        <a href="index.php"><h2>TIH College Space</h2></a>
      </div>
    </div>
    <div id="change-profile">
    <div class="profile-row-img">
        <img src="<?php echo '../../registration/'.$_SESSION['user']['photo']; ?>" alt="Image">
        <h1><?php echo $_SESSION['user']['firstname'].' '.$_SESSION['user']['midname'].' '.$_SESSION['user']['lastname']; ?></h1>
    </div>
    
    <div class="profile-row">
        <div class="profile-row-left">
            <div class="profile-row-left-box">
                Unique Id
            </div>
        </div>
        <div class="profile-row-right">
            <?php echo $_SESSION['user']['unique_id'];?>
        </div>
    </div>
    <div class="profile-row">
        <div class="profile-row-left">
            <div class="profile-row-left-box">
                Date of Birth
            </div>
        </div>
        <div class="profile-row-right">
            <?php $originalDate=$_SESSION['user']['dob'];
$newDate = date("d-m-Y", strtotime($originalDate)); echo $newDate;?>
        </div>
    </div>
    <div class="profile-row">
        <div class="profile-row-left">
            <div class="profile-row-left-box">
                Gender
            </div>
        </div>
        <div class="profile-row-right">
            <?php echo ucfirst($_SESSION['user']['gender']);?>
        </div>
    </div>
    <div class="profile-row">
        <div class="profile-row-left">
            <div class="profile-row-left-box">
                Contact No
            </div>
        </div>
        <div class="profile-row-right">
            <?php echo $_SESSION['user']['phone'];?>
        </div>
    </div>
    <div class="profile-row">
        <div class="profile-row-left">
            <div class="profile-row-left-box">
                Email Id
            </div>
        </div>
        <div class="profile-row-right">
            <?php echo $_SESSION['user']['email'];?>
        </div>
    </div>
    <div class="profile-row">
        <button class="btn btn-success">Edit Profile</button>
    </div>
</div>
        </div>
        
-->
<script>
function myFunction() {
  var x = document.getElementById("myInput");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
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