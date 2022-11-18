<?php
session_start();

if($_SESSION['login'] && $_SESSION['student']){

include 'connection.php';

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style_student.css">
  <link rel="stylesheet" href="style.css">
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <!-- jQuery -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

  <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    
  <link rel="stylesheet" href="../../css/Overlay.css">
  <title>Classes</title>
  <link rel="shortcut icon" href="../../images/logo.png" />
  <style>
    .action{
        z-index: 99;
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
                    <li><img src="images/user.png" alt=""><a href="profile.php">My Profile</a></li>
                    <li><img src="images/schedule.png" alt=""><a  onMouseOver="this.style.cursor='pointer'" onclick="location.reload();">Classes</a></li>
                    <li><img src="images/envelope.png" alt=""><a   href="notes.php">Notes</a></li>
                    <li><img src="images/envelope.png" alt=""><a  href="paper.php">Year Papers</a></li>
                    <li><img src="images/envelope.png" alt=""><a  href="updates.php">Updates</a></li>
                    
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
            <div id="student_class" style="overflow-x:auto;">
                <?php include 'classes_list.php'; ?>
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
      <div class="sc-header-name">
        <a href="index.php"><h2>TIH College Space</h2></a>
      </div>
    </div>
<div id="student_class" style="overflow-x:auto;">
<?php //include 'classes_list.php'; ?>
</div>
-->
    <script>
    function FilterSubject(subjectget){
            semget=$("#sem").val();
            dateget=$("#FilterDate").val();
            $.ajax({
              type:'post',
              url: 'classes_filter.php',
              data : { date : dateget, sem : semget, subject : subjetctget},
              success : function(data){
                $('#student_class').html(data);
              }

            })
          }

      $(document).ready(function(){
        $(document).on('click','tr[data-role=view]',function(){
              // alert($(this).data('id'));
              var dataid=$(this).data('id');
              $.post('classes_view.php',{
                viewid : dataid },
                function(data,status){
                    $('#student_class').html(data);
                })
            });
          });
        function reloadpage(){
            location.reload();
          }
    </script>
    <script src="admin.js"></script>
    
    <?php
  }
else{
  header("location:../../index.html");
}
?>
    </body>

</html>