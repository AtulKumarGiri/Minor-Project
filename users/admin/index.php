
<?php
session_start();
ob_start();
// $conn = mysqli_connect("sql302.epizy.com", "epiz_30514950", "LYBnFW3UacatKl", "epiz_30514950_tihcollegespace");

$conn = mysqli_connect("sql103.epizy.com", "epiz_30798259", "0fc8viOKUIdn", "epiz_30798259_tihcollegespace");
if(!$conn){
    echo '<script> alert("Not Connected") </script>';
}


$admin = "select * from admin";
$student = "SELECT * from `student`";
$teachers = "SELECT * from `teacher`";
$inbox = "SELECT * from `message`";
$total_a = mysqli_query($conn,$admin);
$total_s = mysqli_query($conn, $student);
$total_t = mysqli_query($conn, $teachers);
$total_i = mysqli_query($conn, $inbox);
$total_u = $total_t + $total_s;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style_admin.css">
    <link rel="stylesheet" href="dash.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    
    <link rel="stylesheet" href="../../css/Overlay.css"><!-- jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=El+Messiri&family=Great+Vibes&family=Raleway:wght@300&display=swap" rel="stylesheet">
    

    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <title>Admin</title>
    <link rel="shortcut icon" href="../../images/logo.png" />
    <style>
        .tab1::-webkit-scrollbar,.tab2::-webkit-scrollbar,.inbox::-webkit-scrollbar,.right::-webkit-scrollbar {
            display: none;
        }
        body{
            height: 100%;
        }
        .home{
            height: 100%;
            position: relative;
        }
        ul, ol{
            padding-left: 0px;
        }
        a{
            text-decoration:none;
        }
        .inbox{
            overflow: scroll;
            height: 78vh;
        }

        .user{
            visibility: hidden;
            //width:80%;
            position: relative;
            z-index: 1;
            top: 80px;
            margin: 0px 10px;
            border-radius: 14px;
            //width: 99.5%;
            //overflow: scroll;
            height: 80vh;
        }
        .user::before {
            content: '';
            position: absolute;
            top: -10px;
            right: 30px;
            width: 20px;
            height: 20px;
            background: #fff;
            transform: rotate(45deg);
            margin: 0px -128px 20px 0px;
            margin: 0px 0px 0px 0px;
            z-index: -1;
        }
        .user.active{
            background: #fff;
            box-sizing: 0 5px 25px rgba(0, 0, 0, 0.171);
            visibility: visible;
            opacity: 0.99;
            position: absolute;
            box-shadow: 0px 0px 10px #00000059;
            padding: 5px 20px;
        }
        tr{
            //opacity: 1;
            //background: #fff;
            //box-sizing: 0 5px 25px rgba(0, 0, 0, 0.171);
            //border: 1px solid black;
        }
        td{
            
            margin: 20px 50px;
            padding: 30px 50px;
            //background: white;
            color:  #05386b;
        }
        .menu li{
            cursor: pointer;
        }
        .action .profile{
            z-index:99;
        }
        .action .menu .active{
            z-index:99;
        }
        .tab1{
            overflow: scroll;
            height: 78vh;
        }
        .tab2{
            overflow-y: scroll;
            height: 78vh;
        }
        
        @media screen and (max-width: 500px) {
            .user{
                height: 75vh;
            }
            .user td,th{
                font-size: 10px;
            }
            .tab1{
                height: 35vh;
                margin-top: 20px;
                //margin-bottom: 10px;
                /* border-bottom: 2px dotted black; */
            }
            .tab2{
                height: 35vh;
                margin-top:10px;
               // margin-bottom: 20px;
                /* border-top: 2px dotted black; */
            }
            .user.active{
                padding: 0px;
            }
        }
        
        
        
    </style>

</head>
<body>
<?php
if($_SESSION['login'] && $_SESSION['admin']){
?>
    <div class="home" id="home">
        <div class="topdesign" id="top">
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
                    <li><div onclick="toggUser('user');">
                    <img src="images/edit.png" alt="">Users</div></li>
                    <li><a href="../../logout.php"><img src="images/log-out.png" alt="">Logout</a></li>
                </ul>
            </div>
            <section>
                <div class="right">
                    <a onclick="toggUser('user');" href="#" class="active">
                        <div id="home">
                            <div class="elem">
                                <i class="fa fa-users" aria-hidden="true"></i>
                                <div class="num">
                                
                                    <div class="wrapper1">
                                        <!--<span class="box forth-number"></span>
                                        <span class="box third-number"></span>
                                        <span class="box second-number"></span>
                                        <span class="box first-number"></span>-->
                                        <?php echo "<b>".(mysqli_num_rows($total_s)+mysqli_num_rows($total_t))."</b>";?>
                                    </div>
                                    <p>Total</p>
                                </div>
                            </div>
                            <div class="box1">
                                <p>Registered Users</p>
                            </div>
                        </div>
                    </a>
                    <a href="#" class="active" onclick="toggUser('admin');">
                        <div id="home">
                            <div class="elem">
                                <i class="fa fa-users" aria-hidden="true"></i>
                                <div class="num">
                                
                                    <div class="wrapper1">
                                         <?php echo "<b>".mysqli_num_rows($total_a)."</b>";?>
                                    </div>
                                    <p>Total</p>
                                </div>
                            </div>
                            <div class="box1">
                                <p>Admins</p>
                            </div>
                        </div>
                    </a>
                    <a href="#" class="active" onclick="toggUser('teacher');">
                        <div id="home">
                            <div class="elem">
                                <i class="fa fa-users" aria-hidden="true"></i>
                                <div class="num">
                                
                                    <div class="wrapper1">
                                        <?php echo "<b>".mysqli_num_rows($total_t)."</b>";?>
                                    </div>
                                    <p>Total</p>
                                </div>
                            </div>
                            <div class="box1">
                                <p>Teachers</p>
                            </div>
                        </div>
                    </a>
                    <a href="#" class="active" onclick="toggUser('student');">
                        <div id="home">
                            <div class="elem">
                                <i class="fa fa-users" aria-hidden="true"></i>
                                <div class="num">
                                
                                    <div class="wrapper1">
                                         <?php echo "<b>".mysqli_num_rows($total_s)."</b>";?>
                                    </div>
                                    <p>Total</p>
                                </div>
                            </div>
                            <div class="box1">
                                <p>Students</p>
                            </div>
                        </div>
                    </a>
                    <a href="message_show.php"  class="active">
                        <div id="home">
                            <div class="elem">
                                <i class="fa fa-users" aria-hidden="true"></i>
                                <div class="num">
                                
                                    <div class="wrapper1">
                                         <?php echo "<b>".mysqli_num_rows($total_i)."</b>";?>
                                    </div>
                                    <p>Total</p>
                                </div>
                            </div>
                            <div class="box1">
                                <p>Inbox</p>
                            </div>
                        </div>
                    </a>
                
            </section>


            <div class="user table row d-flex justify-content-between" id="admin">
            <div style="display: float; float: right; position:absolute;"><input style="float:right; margin-top: 10px;" type="button" onclick="toggUser('admin');" value="&nbsp;X&nbsp;"></div>
               <div class=" col-12 inbox">
                    
                    <table id="myTable" class="table caption-top">
                        <caption>Admin Details</caption>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Unique Id</th>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Phone</th>
                            <th scope="col">Gender</th>
                            <th scope="col">Phone</th>
                            <th scope="col">Delete</th>
                        </tr>
                        <?php
                            $myid=$_SESSION['user']['unique_id'];
                            $q = "SELECT * FROM `admin`";
                            $query = mysqli_query($conn, $q);
                            while($res = mysqli_fetch_array($query)){
                        ?>      
                                <tr>
                                    <td><?php echo($res['id']); ?> </td>
                                    <td><?php echo($res['unique_id']); ?> </td>
                                    <td><?php echo($res['firstname']." ".$res['midname']." ".$res['lastname']); ?></td>
                                    <td><?php echo($res['email']); ?></td>
                                    <td><?php echo($res['phone']); ?></td>
                                    <td><?php echo($res['gender']); ?></td>
                                    <td><?php echo($res['phone']); ?></td>
                                    <?php
                                    if($res['unique_id']!=$myid){
                                        ?>
                                    <td><button class="btn-danger">&nbsp;<a href="inbox/delete.php?email=<?php echo $res['email'];?>&role=<?php echo $res['role'];?>">x</a>&nbsp;</button></td>         <?php
                                    }
                                    ?>
                                </tr>
                        <?php
                            }
                        ?>
                      
                    </table>
                </div>
            </div>

            
            <div class="user table row d-flex justify-content-between" id="teacher">
            <div style="display: float; float: right; position:absolute;"><input style="float:right; margin-top: 10px;" type="button" onclick="toggUser('teacher');" value="&nbsp;X&nbsp;"></div>
               <div class=" col-12 inbox">
                    
                    <table id="myTable" class="table caption-top">
                        <caption>Teacher Details</caption>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Unique Id</th>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Phone</th>
                            <th scope="col">Gender</th>
                            <th scope="col">Dob</th>
                            <th scope="col">Department</th>
                            <th scope="col">Delete</th>
                        </tr>
                        <?php
                            $q = "SELECT * FROM `teacher`";
                            $query = mysqli_query($conn, $q);
                            while($res = mysqli_fetch_array($query)){
                        ?>      
                                <tr>
                                    <td><?php echo($res['id']); ?> </td>
                                    <td><?php echo($res['unique_id']); ?> </td>
                                    <td><?php echo($res['firstname']." ".$res['midname']." ".$res['lastname']); ?></td>
                                    <td><?php echo($res['email']); ?></td>
                                    <td><?php echo($res['phone']); ?></td>
                                    <td><?php echo($res['gender']); ?></td>
                                    <td><?php echo($res['dob']); ?></td>
                                    <td><?php   
                                    $str = "";
                                    if($res['bca'] == 1)
                                        $str = $str."BCA ";
                                    if($res['bba'] == 1)
                                        $str = $str."BBA ";
                                    if($res['mca'] == 1)
                                        $str = $str."MCA ";
                                    if($res['msc'] == 1)
                                        $str = $str."MSC ";
                                    echo ($str);
                                     ?></td>
                                    <td><button class="btn-danger">&nbsp;<a href="inbox/delete.php?email=<?php echo $res['email'];?>&role=<?php echo $res['role'];?>">x</a>&nbsp;</button></td>
                                </tr>
                        <?php
                            }
                        ?>
                      
                    </table>
                </div>
            </div>

            
           <div class="user table row d-flex justify-content-between" id="student">
            <div style="display: float; float: right; position:absolute;"><input style="float:right; margin-top: 10px;" type="button" onclick="toggUser('student');" value="&nbsp;X&nbsp;"></div>
               <div class=" col-12 inbox">
                    
                    <table id="myTable" class="table caption-top">
                        <caption>Student Details</caption>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Unique Id</th>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Phone</th>
                            <th scope="col">Gender</th>
                            <th scope="col">Dob</th>
                            <th scope="col">Stream</th>
                            <th scope="col">Section</th>
                            <th scope="col">Semester</th>
                            <th scope="col">Delete</th>
                        </tr>
                        <?php
                            $q = "SELECT * FROM `student`";
                            $query = mysqli_query($conn, $q);
                            while($res = mysqli_fetch_array($query)){
                        ?>      
                                <tr>
                                    <td><?php echo($res['id']); ?> </td>
                                    <td><?php echo($res['unique_id']); ?> </td>
                                    <td><?php echo($res['firstname']." ".$res['midname']." ".$res['lastname']); ?></td>
                                    <td><?php echo($res['email']); ?></td>
                                    <td><?php echo($res['phone']); ?></td>
                                    <td><?php echo($res['gender']); ?></td>
                                    <td><?php echo($res['dob']); ?></td>
                                    <td><?php echo ($res['stream']); ?></td>
                                    <td><?php echo ($res['section']); ?></td>
                                    <td><?php echo ($res['semester']); ?></td>
                                    <td><button class="btn-danger">&nbsp;<a href="inbox/delete.php?email=<?php echo $res['email'];?>&role=<?php echo $res['role'];?>">x</a>&nbsp;</button></td>
                                </tr>
                        <?php
                            }
                        ?>
                      
                    </table>
                </div>
                
            </div>
            

            <div class="user table row d-flex justify-content-between" id="user">
            <div style="display: float; float: right; position:absolute;"><input style="float:right; margin-top: 10px;" type="button" onclick="toggUser('user');" value="&nbsp;X&nbsp;"></div>
               <div class="col-lg-6 col-12 tab1">
                    <table id="myTable" class="table caption-top">
                        <caption>List of users</caption>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Email</th>
                            <th scope="col">Role</th>
                   
                            <th scope="col">Delete</th>
                        </tr>
                        <?php
                            $q = "SELECT * FROM `verification_data`";
                            $query = mysqli_query($conn, $q);
                             while($res = mysqli_fetch_array($query)){
                        ?>      
                                <tr>
                                    <td><?php echo($res['id']); ?> </td>
                                    <td><?php echo($res['email']); ?> </td>
                                    <td><?php echo($res['role']); ?></td>
                                    
                                    <td><button class="btn-danger">&nbsp;<a href="manage_users/delete.php?email=<?php echo $res['email'];?>&role=<?php echo $res['role'];?>">x</a>&nbsp;</button></td>
                                </tr>
                        <?php
                            }
                        ?>
                    </table>
                </div>
                <div class="col-lg-5 col-12 tab2">
                    <p style="color: #6c757d; margin-top:10px;">Add New Users</p>
                    <form id="adduser" method="post" class="row g-3">
                        <div class="col-md-4">
                            <label for="Unique_id" class="form-label">Unique_id</label>
                            <input type="text" name="unique_id" id="unique_id" class="input form-control" required>
                        </div>
                        <div class="col-md-4">
                            <label for="Email" class="form-label">Email</label>
                            <input type="email" name="email" id="email" class="input form-control" required>
                        </div>
                        <div class="col-md-3">
                            <label for="Role" class="form-label">Role</label>
                            <select class="input form-select" name="role" id="role" required>
                                <option selected disabled value="">Choose...</option>
                                <option value="admin">Admin</option>
                                <option value="teacher">Teacher</option>
                                <option value="student">Student</option>
                            </select>
                        </div>
                        <div class="col-12">
                            <button class="btn btn-success" id='insert' type="button" onclick="save_data();">Add User</button>
                        </div>
                        <div id="message" class="col-12">
                            
                        </div>
                    </form>
                    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
                    <script>
                    function save_data(){
                        var form_element = document.getElementsByClassName('input');
                        console.log(form_element);

                        var form_data = new FormData();

                        for(var c = 0 ; c < form_element.length ; c++) {
                            form_data.append(form_element[c].name, form_element[c].value);
                            console.log()
                        }
                        document.getElementById('insert').disabled = true;
                        console.log(form_data);
                        var ajax_request = new XMLHttpRequest();

                        ajax_request.open('POST', 'manage_users/insert.php');
                        ajax_request.send(form_data);

                        ajax_request.onreadystatechange = function(){
                            
                            if(ajax_request.readyState == 4 && ajax_request.status == 200){
                                document.getElementById('insert').disabled = false;

                                document.getElementById('adduser').reset();

                                document.getElementById('message').innerHTML = ajax_request.responseText;
                                
                                setTimeout(()=>{
                                    document.getElementById('message').innerHTML = '';
                                    
                                }, 5000);
                                location.reload();
                            //$('#user').load('index.php' +  ' #user');
                            }
                        }
                    }
                    


                    </script>
                </div>
            </div>
        


    <!-- Adding Overlay -->
    <div id="overlay"></div>
    <script src="admin.js"></script>
    <script src="../../Javascripts/Overlay.js"></script>
<?php
}
else{
    header("location:../../index.html");
}
?>

</body>
</html>