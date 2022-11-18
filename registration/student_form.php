 
 <?php
 session_start();
  if($_SESSION['user']['role'] == 'student'){
      ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Registration Form</title>
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
        <form action="register_student.php" method="post" enctype="multipart/form-data">
            <div class="wrapper">
                <div class="title">
                    Registration Form
                </div>
                <div class="form">
                    <div id="Student_details">
                        <h2><?php echo $_SESSION['user']['role']?> details</h2>
                        <div class="input_field">
                            <label>Unique Id*</label>
                            <input type="text" name="unique_id" class="input" value="<?php echo $_SESSION['user']['unique_id']?>"  readonly>
                        </div>
                        <div class="input_field">
                            <label>First Name*</label>
                            <input type="text" name="firstname" class="input" required>
                        </div>
                        <div class="input_field">
                            <label>Mid Name</label>
                            <input type="text" name="midname" class="input">
                        </div>
                        <div class="input_field">
                            <label>Last Name*</label>
                            <input type="text" name="lastname" class="input" required>
                        </div>
                        <div class="input_field">
                            <label>DOB*</label>
                            <input type="date" name="dob" class="input" required>
                        </div>
                        <div class="input_field">
                            <label>Gender*</label>
                            <div class="custom_select">
                                <select name="gender" id="" required>
                                    <option value="male">Male</option>
                                    <option value="female">Female</option>
                                </select>
                            </div>
                        </div>
                        <div class="input_field terms">
                            <label>Stream*</label>
                            <label class="check">
                                BCA&nbsp;
                                <input type="radio" name="stream" value="BCA" required>
                                <span class="checkmark"></span>
                            </label>
                            <label class="check">
                                BBA&nbsp;
                                <input type="radio" name="stream" value="BBA" required>
                                <span class="checkmark"></span>
                            </label>
                            <label class="check">
                                MCA&nbsp;
                                <input type="radio" name="stream" value="MCA" required>
                                <span class="checkmark"></span>
                            </label><label class="check">
                                MSC&nbsp;
                                <input type="radio" name="stream" value="MSC" required>
                                <span class="checkmark"></span>
                            </label> 
                        </div>
                        <div class="input_field terms">
                            <label>Section*</label>
                            <label class="check">
                                Alpha&nbsp;
                                <input type="radio" name="section" value="Alpha" required>
                                <span class="checkmark"></span>
                            </label>
                            <label class="check">
                                Beta&nbsp;
                                <input type="radio" name="section" value="Beta" required>
                                <span class="checkmark"></span>
                            </label>
                        </div>
                          <div class="input_field terms">
                            <label>Semester*</label>
                            <div class="custom_select">
                            <select name="semester" required>
                                    <option value="SEM1">Semester1</option>
                                    <option value="SEM2">Semester2</option>
                                    <option value="SEM3">Semester3</option>
                                    <option value="SEM4">Semester4</option>
                                    <option value="SEM5">Semester5</option>
                                    <option value="SEM6">Semester6</option>
                            </select>
                            </div>
                        </div>
                        <div class="input_field">
                            <label>Phone*</label>
                            <input type="text" id="tel" name="phone" placeholder="1234567890" class="input" required>
                        </div>
                        <div class="input_field">
                            <label>Email*</label>
                            <input type="email" class="input" name="email" value="<?php echo $_SESSION['user']['email']?>" readonly>
                        </div>
                        <div class="input_field terms">
                            <label>Password*</label>
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
                        <div class="input_field" id="msg">
                            <label></label>
                        </div>
                        <div class="input_field">
                            <label>Profile Picture</label>
                            <input type="file" name="photo" class="input" required>
                        </div> 
                    <div class="input_field terms">
                        <label class="check">
                            <input type="checkbox" required>
                            <span class="checkmark"></span>
                        </label>
                        <p>I hereby declare that all the information given by me is correct</p>
                    </div>
                    <div class="input_field">
                        <input type="submit" id="submit" name="submit" class="btn">
                    </div>
                </div>
            </div>
        </form>
    </body>
    <script>
        //change department value
        function changeVal(id){
            var dep = document.getElementById(id);
            if(dep.checked){
                dep.value = 1;
            }
            else{
                dep.value = 0;
            }
        }
        //phone number validation
        var submit = document.getElementById("submit");
        var tel = document.getElementById("tel");
        function validateTel(){
            if(tel.value.length != 10){
                tel.style.color = 'red';
                submit.disabled = true;
            }
            else{
                tel.style.color = 'black';
                submit.disabled = false;
            }
        }
        tel.onchange = validateTel;
        tel.onkeyup = validateTel;

        //toggle show hide password
        var pass = document.getElementById("password");
        function togglePass(){
        
            if(pass.type == "password"){
                pass.type = "text";
            }
            else{
                pass.type = "password";
            }
        }
        //password verification
        
        var cpass = document.getElementById("cpassword"); 
        var msg = document.getElementById("msg");
        function validatePassword(){
            if(pass.value == cpass.value){
                cpass.style.color = 'black';
                submit.disabled = false;
            }
            else{
                cpass.style.color = 'red';
                submit.disabled = true;
            }
        }
        pass.onchange = validatePassword;
        cpass.onkeyup = validatePassword;
    </script>
    </html>
 <?php
 }           
 ?>