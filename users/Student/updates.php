<?php
session_start();

if($_SESSION['login'] && $_SESSION['student']){

include 'connection.php';
$query = "SELECT * FROM updates order by date desc";
$result = mysqli_query($conn,$query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Updates</title>
    <link rel="shortcut icon" href="../../images/logo.png" />
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="style_student2.css">
<link rel="stylesheet" href="style_student.css">
  <link rel="stylesheet" href="style.css">
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <!-- jQuery -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <link rel="stylesheet" href="../../css/Overlay.css">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=El+Messiri&family=Great+Vibes&family=Raleway:wght@300&display=swap" rel="stylesheet">
    <style>

    </style>
</head>
<body>



  <div class="home" style="width:100%; margin-top:-100px;">
    
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
                    <li><img src="images/user.png" alt=""><a href="profile.php">My Profile</a></li>
                    <li><img src="images/schedule.png" alt=""><a  href="classes.php">Classes</a></li>
                    <li><img src="images/envelope.png" alt=""><a   href="notes.php">Notes</a></li>
                    <li><img src="images/envelope.png" alt=""><a  href="paper.php">Year Papers</a></li>
                    <li><img src="images/envelope.png" alt=""><a  onMouseOver="this.style.cursor='pointer'" onclick="location.reload();">Updates</a></li>
                    
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
            <div id="student_updates" style="overflow-x:auto;">
                <?php include 'updates_list.php'; ?>
            </div>
            <div style="height:100px; width:100%;">

            </div>
        </section>
    </section>


        </div>
        
    </div>


<!--
   <div class="sc-header">
      <div class="sc-header-logo">
        <a href="index.php"><img src="../../images/logo.png" alt="TihCollegeSpace"></a>
      </div>
      <div class="sc-header-name" style="font-family: 'Poppins', sans-serif;">
        <a href="index.php"><h2>TIH College Space</h2></a>
      </div>
  </div>


<div id="student_updates" style="overflow-x:auto;">
<?php //include 'updates_list.php'; ?>
</div>

-->

<script>
      $(document).ready(function(){
            $(document).on('click','tr[data-role=view]',function(){
              // alert($(this).data('id'));
              var dataid=$(this).data('id');
              $.post('updates_view.php',{
                viewid : dataid },
                function(data,status){
                    $('#student_updates').html(data);
                })
            });
        });
        function reloadpage(){
            location.reload();
          }
    </script>
    <script>
      $(document).ready(function(){
          $(document).on('click','h2[data-role=updates]',function(){
              // alert($(this).data('id'));
              $.post('updates_list.php',
              function(data,status){
                  $('#student_updates').html(data);
                })
            });
        });
        function reloadpage(){
            location.reload();
          }
        </script>
<?php
  }
else{
  header("location:../../index.html");
}
?>
</body>
</html>