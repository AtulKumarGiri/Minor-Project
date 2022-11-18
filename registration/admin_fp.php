 
 <?php
 session_start();
  if($_SESSION['user']['role'] == 'admin'){
      ?>
            <!DOCTYPE html>
            <html lang="en">
            <head>
                <meta charset="UTF-8">
                <meta http-equiv="X-UA-Compatible" content="IE=edge">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title>Reset Password</title>
                <link rel="stylesheet" href="style.css">
                <style>
                    
                    ol{
                        width: auto;
                        height: 100px;
                    }
                    ol li{
                        width: 100px;
                        height: 50px;
                        background: yellow;
                        float: left;
                        margin-left: 10px;
                        list-style-type: none;
                        padding-top: 15px;
                        text-align: center;
                        border-radius: 10px;
                        animation: ;
                    }
                    ol li a{
                        text-decoration: none;
                        color: black;
                    }
                
                </style>
            </head>
            <body>
                <form action="fp_admin.php" method="post" enctype="multipart/form-data">
                    <div class="wrapper">
                        <div class="title">
                            Reset Your Password
                        </div>
                        <div class="form">
                            <div id="Student_details">
                                <h2 style="display:none;"><?php echo $role?> details</h2>
                                <div class="input_field" style="display:none;">
                                    <label>Unique Id*</label>
                                    <input type="text" name="unique_id" class="input" value="<?php echo $_SESSION['user']['unique_id']?>"  readonly>
                                </div>
                                <div class="input_field" style="display:none;">
                                    <label>Email*</label>
                                    <input type="email" name="email" class="input" value="<?php echo $_SESSION['user']['email']?>"  readonly>
                                </div>
                                
                                <div class="input_field terms">
                                    <label>New Password*</label>
                                    <input type="password" name="password" id="password" class="input" required>
                                    
                                </div>
                                <label class="check">
                                        <input type="checkbox" id="show" onclick="togglePass()">
                                        <span class="checkmark"></span>
                                        &nbsp;Show Password
                                </label>
                                <br><br>
                                <div class="input_field">
                                    <label>Confirm Password*</label>
                                    <input type="password" name="cpassword" id="cpassword" class="input" required>
                                </div>
                                <div class="input_field" id="msg1">
                                    
                                </div>
                            <div class="input_field">
                                <input type="submit" id="submit" name="submit" class="btn">
                            </div>
                        </div>
                    </div>
                </form>
            </body>
            <script>
                //toggle show hide password
                var pass = document.getElementById("password");
                function togglePass(){
                
                    if(password.type == "password"){
                        password.type = "text";
                    }
                    else{
                        password.type = "password";
                    }
                }
                //password verification
                var cpass = document.getElementById("cpassword"); 
                var msg = document.getElementById("msg");
                function validatePassword(){
                    if(pass.value == cpass.value){
                        cpass.style.color = 'black';
                        submit.disabled = false;
                        document.getElementById("msg1").innerHTML = "";
                    }
                    else{
                        cpass.style.color = 'red';
                        submit.disabled = true;
                        document.getElementById("msg1").innerHTML = "Both Password must be same!";
                    }
                }
                password.onchange = validatePassword;
                cpassword.onkeyup = validatePassword;
            </script>
            </html>
 <?php
 }           
 ?>