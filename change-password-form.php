<?php

$otp=$_POST['otp'];
echo $otp;


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/Overlay.css">
    <link rel="stylesheet" href="../../css/schedule.css">
    <link rel="stylesheet" type="" href="style.css">
    <link rel="stylesheet" type="" href="forget.css">
    <title>Reset Password</title>
    <link rel="shortcut icon" href="images/logo.png" />

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=El+Messiri&family=Great+Vibes&family=Raleway:wght@300&display=swap" rel="stylesheet">
    
</head>
<body>
 

        <div class="limit">
    <div class="login-container">
        <div class="bb-login">
            <form class="bb-form validate-form" method="post"> <span class="bb-form-title p-b-26">FORGET PASSWORD </span> <span class="bb-form-title p-b-48"> <i class="mdi mdi-symfony"></i> </span>
            <input type="password" class="form-control" style="margin-bottom:20px;" aria-describedby="emailHelp" placeholder="Enter New Password">
            <input type="password" class="form-control"  aria-describedby="emailHelp" placeholder="Re-Enter New Password">
                <div class="login-container-form-btn">
                    <div style="margin-bottom:20px; margin-right:10px;">
                    <div class="bb-login-form-btn">
                        <div class="bb-form-bgbtn"></div> <button class="bb-form-btn" > Submit </button>
                    </div>
                    </div>
                    <div>
                    <div class="bb-login-form-btn">
                        <div class="bb-form-bgbtn"></div>  <button class="bb-form-btn" onclick="location:'index.html'">Cancel</button>
                    </div>
                    <div>
                </div>
                 </form>
        </div>
    </div>
</div>





    <script src="admin.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>


</body>
</html>