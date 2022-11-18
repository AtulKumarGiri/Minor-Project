<?php
session_start();

?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style_admin.css">
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="dash.css">
  <link rel="stylesheet" href="../Student/style.css">
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
  <!-- jQuery -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
   <link rel="stylesheet" href="../../css/Overlay.css">
  <title><?php echo $_SESSION['user']['firstname'].' Profile'?></title>
  <link rel="shortcut icon" href="../../images/logo.png" />
  
  <style>
    .action{
        z-index: 99;
    }
    *{
        text-decoration: none;
    }
    .modalCenter{
        top:50% !important;
        transform:translateY(-50%) !important;
    }
    </style>
</head>

<body>

  <?php
  if ($_SESSION['login'] && $_SESSION['admin']) {
  ?>


  


  <div class="home">
    
        <div class="topdesign" >
            
        </div>
        
        <div class="action" id="action">
            <div class="profile" onclick="toggle();">
                <img src="<?php echo '../../registration/'.$_SESSION['user']['photo']; ?>" alt="">
            </div>
            <div class="menu">
                <h3><?php echo $_SESSION['user']['firstname'].' '.$_SESSION['user']['midname'].' '.$_SESSION['user']['lastname']; ?> <br>
                <span>Admin</span>
                </h3>
                <ul>
                    <li><a href="index.php"> <img src="images/user.png" alt="">Dashboard</a></li>
                    <li><a href="profile.php"> <img src="images/user.png" alt="">My Profile</a></li>
                    <li><a href="message_show.php"> <img src="images/envelope.png" alt="">Inbox</a></li>
                    <li><a href="../../logout.php"><img src="images/log-out.png" alt="">Logout</a></li>
                </ul>
            </div>
            <div class="sc-header" style="background:transparent; ">
                <div class="sc-header-logo">
                    <a href="index.php" ><img src="../../images/logo.png" alt="TihCollegeSpace"></a>
                </div>
                <div class="sc-header-name">
                    <a href="index.php" ><h2 >TIH College Space</h2></a>
                </div>
            </div>
        
        <section class="page-container">
        <section class="page-content">
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
            <a style="text-decoration:none; color:white;" ><button class="btn btn-success"data-bs-toggle="modal" data-bs-target="#myModal">Change Password</button></a>
            
        
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



    <script>
    function myFunction() {
  var x = document.getElementById("myInput");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}
    //  $(document).ready(function(){
    // $('#btnchg').click(function () {
	// $('#ChangeModal').modal({show : true});
    //  });
    // });
    </script>

  
    <script src="admin.js"></script>
    <script src="../../Javascripts/Overlay.js"></script>
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  <?php
  } else {
    header("location:../../index.html");
  }
  ?>
</body>

</html>