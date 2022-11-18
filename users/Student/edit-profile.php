<?php
$conn = mysqli_connect("sql302.epizy.com", "epiz_30514950", "LYBnFW3UacatKl", "epiz_30514950_tihcollegespace");
session_start();
if ($_SESSION['login'] && $_SESSION['student']) {
$id = $_GET['id'];
$id=$_SESSION['user']['unique_id'];
$sql="select * from student where unique_id='$id'";
$query = mysqli_query($conn,$sql);
$r = mysqli_fetch_array($query);
?>
<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Registration Form</title>
        <link rel="stylesheet" href="../../registration/style.css">
        <style>
            *{
                text-decoration:none;
            }
            
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
        <form action="edit-code-profile.php" enctype="multipart/form-data" method="post">
             <div class="wrapper">
                <div class="title">
                    Edit Profile
                </div>
                <div class="form">
                    <div id="Student_details">
                        <div class="input_field">
                            <label>Unique Id*</label>
                            <input type="text" name="unique_id" class="input" value="<?php echo $_SESSION['user']['unique_id']?>"  disabled>
                        </div>
                        <div class="input_field">
                            <label>First Name*</label>
                            <input type="text" name="firstname"  value="<?php echo $_SESSION['user']['firstname']?>" class="input" disabled>
                        </div>
                        <div class="input_field">
                            <label>Mid Name</label>
                            <input type="text" name="midname"  value="<?php echo $_SESSION['user']['midname']?>" class="input" disabled>
                        </div>
                        <div class="input_field">
                            <label>Last Name*</label>
                            <input type="text" name="lastname"  value="<?php echo $_SESSION['user']['lastname']?>" class="input" disabled>
                        </div>
                        <div class="input_field">
                            <label>DOB*</label>
                            <input type="date" name="dob"  value="<?php echo $_SESSION['user']['dob']?>" class="input" disabled>
                        </div>
                        <div class="input_field">
                            <label>Gender*</label>
                            <div class="custom_select">
                                <select name="gender" id="" disabled>
                                    <option value="male" class="input" <?php if($_SESSION['user']['gender']=='male'){echo 'selected';}  ?> >Male</option>
                                    <option value="female" class="input" <?php if($_SESSION['user']['gender']=='female'){echo 'selected';}  ?> >Female</option>
                                </select>
                            </div>
                        </div>
                        <div class="input_field terms">
                            <label>Stream*</label>
                            <label class="check">
                                <input type="text" class="input" name="stream" value="<?php echo ($_SESSION['user']['stream'])?>"" disabled>
                            </label>
                       
                        </div>
                       
                        <div class="input_field terms">
                            <label>Section*</label>
                            <label class="check">
                                Alpha&nbsp;
                                <input type="radio" name="section" value="Alpha" <?php if($_SESSION['user']['section']=='Alpha'){echo 'checked';}  ?>>
                                <span class="checkmark"></span>
                            </label>
                            <label class="check">
                                Beta&nbsp;
                                <input type="radio" name="section" value="Beta" <?php if($_SESSION['user']['section']=='Beta'){echo 'checked';}  ?>>
                                <span class="checkmark"></span>
                            </label>
                        </div>
                          <div class="input_field terms">
                            <label>Semester*</label>
                            <div class="custom_select">
                            <select name="semester">
                                    <option value="SEM1" class="input" <?php if($_SESSION['user']['semester']=='SEM1'){echo 'selected';}  ?>>Semester 1</option>
                                    <option value="SEM2" class="input" <?php if($_SESSION['user']['semester']=='SEM2'){echo 'selected';}  ?>>Semester 2</option>
                                    <option value="SEM3" class="input" <?php if($_SESSION['user']['semester']=='SEM3'){echo 'selected';}  ?>>Semester 3</option>
                                    <option value="SEM4" class="input" <?php if($_SESSION['user']['semester']=='SEM4'){echo 'selected';}  ?>>Semester 4</option>
                                    <option value="SEM5" class="input" <?php if($_SESSION['user']['semester']=='SEM5'){echo 'selected';}  ?>>Semester 5</option>
                                    <option value="SEM6" class="input" <?php if($_SESSION['user']['semester']=='SEM6'){echo 'selected';}  ?>>Semester 6</option>
                            </select>
                            </div>
                        </div>
                        
                        <div class="input_field">
                            <label>Phone*</label>
                            <input type="text" id="tel" value ="<?php echo $_SESSION['user']['phone']; ?>" name="phone" class="input">
                        </div>
                        <div class="input_field">
                            <label>Email*</label>
                            <input type="email" class="input" name="email" value="<?php echo $_SESSION['user']['email']?>" disabled>
                        </div>
                        <div class="input_field">
                            <label>Profile Picture</label>
                            <input type="file" name="photo" value="<?php echo $_SESSION['user']['photo']?>" class="input">
                        </div> 
                    <div class="input_field">
                        <input type="submit" id="submit" name="submit" class="btn">
                    </div>
                </div>
            </div>
        </form>
        <?php
  } else {
    header("location:../../index.html");
  }
  ?>
    </body>
</html>
