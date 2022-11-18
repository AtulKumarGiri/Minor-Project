<?php

$conn = mysqli_connect("sql302.epizy.com", "epiz_30514950", "LYBnFW3UacatKl", "epiz_30514950_tihcollegespace");

session_start();

if ($_SESSION['login'] && $_SESSION['teacher']) {

$id=$_SESSION['user']['unique_id'];

$sql="select * from teacher where unique_id='$id'";

$query = mysqli_query($conn,$sql);

$r = mysqli_fetch_array($query);



?>

<!DOCTYPE html>

    <html lang="en">

    <head>

        <meta charset="UTF-8">

        <meta http-equiv="X-UA-Compatible" content="IE=edge">

        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>Edit-Profile Form</title>

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

                /* animation: ; */

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

                                    <input type="text" name="unique_id" class="input" value="<?php echo $_SESSION['user']['unique_id'] ?>" disabled>

                                </div>

                                <div class="input_field">

                                    <label>First Name*</label>

                                    <input type="text" name="firstname" class="input" value="<?php echo $_SESSION['user']['firstname'] ?>" disabled>

                                </div>

                                <div class="input_field">

                                    <label>Mid Name</label>

                                    <input type="text" name="midname" class="input" value="<?php echo $_SESSION['user']['midname'] ?>" disabled>

                                </div>

                                <div class="input_field">

                                    <label>Last Name*</label>

                                    <input type="text" name="lastname" class="input" value="<?php echo $_SESSION['user']['lastname'] ?>" disabled>

                                </div>

                                <div class="input_field">

                                    <label>DOB*</label>

                                    <input type="date" name="dob" class="input" value="<?php echo $_SESSION['user']['dob'] ?>" disabled>

                                </div>

                                <div class="input_field">

                                    <label>Gender*</label>

                                    <div class="custom_select">

                                        <select name="gender" id="" disabled>

                                            <option value="male"  <?php if($_SESSION['user']['gender']=='male'){echo 'selected';}  ?> disabled>Male</option>

                                            <option value="female"  <?php if($_SESSION['user']['gender']=='female'){echo 'selected';}  ?> disabled>Female</option>

                                        </select>

                                    </div>

                                </div>

                        <div class="input_field">

                                    <label>Email*</label>

                                    <input type="email" class="input" name="email" value=" <?php  echo $_SESSION['user']['email'] ?>" disabled>

                                </div>

                        <div class="input_field">

                            <label>Phone*</label>

                            <input type="text" id="tel" value ="<?php echo $_SESSION['user']['phone'];?>" name="phone" placeholder="1234567890" class="input">

                        </div>



                        <div class="input_field">

                            <label>Profile Picture</label>

                            <input type="file" name="photo" value ="<?php echo $_SESSION['user']['photo']; ?> " class="input">

                        </div> 

                    <div class="input_field">

                        <input type="submit" id="submit" name="submit" class="btn">

                    </div>

                </div>

            </div>

        </form>

        <?php

  } else {

    header("location:index.html");

  }

  ?>

    </body>

</html>

