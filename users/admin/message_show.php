<?php
session_start();
if($_SESSION['login'] && $_SESSION['admin']){
?>
<?php 
// $conn = mysqli_connect("sql302.epizy.com","epiz_30514950","LYBnFW3UacatKl","epiz_30514950_tihcollegespace");
include '../../connection.php';
$q="select * from message";
$x=mysqli_query($conn,$q);
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
    <link rel="stylesheet" type="" href="message-style.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css"
    integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
    <title>Inbox</title>
    <!-- jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=El+Messiri&family=Great+Vibes&family=Raleway:wght@300&display=swap" rel="stylesheet">
    
    <link rel="shortcut icon" href="../../images/logo.png" />

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
     <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    
    <!-- jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=El+Messiri&family=Great+Vibes&family=Raleway:wght@300&display=swap" rel="stylesheet">
    
</head>
<body class="bg-logo">
    
    <!-- <div class="back">
      <h2><a href="index.php">Go to Database</a></h2>
    </div> -->
   
    <div class="sc-header">
      <div class="sc-header-logo">
        <a href="index.php"><img src="../../images/logo.png" alt="TihCollegeSpace"></a>
      </div>
      <div class="sc-header-name">
        <a href="index.php"><h2>TIH College Space</h2></a>
      </div>
    </div>
    <header id="table1">

<h2>Inbox</h2>
</header>
    <div class="container" id="change-message" >
    <div class="container my-5">
    <table class="table table-hover">
    <tr>
         <div class="d-md-flex d-none justify-content-md-between justify-content-sm-center align-content-center border-bottom border-2 my-2 bg-dark text-light p-3 rounded-3">
        <div class="col-1 text-sm-center text-md-start align-self-center">
            <h1 class="h5 fw-bold">M-ID</h1>
        </div>
        <div class="col-3 align-self-center">
            <h1 class="h5 fw-bold">Name</h1>
        </div>
        <div class="col-3 align-self-center">
            <h1 class="h5 fw-bold">Email</h1>
        </div>
       
        <div class="col-1 align-self-center">
            <h1 class="h5 fw-bold">View</h1>
        </div>
        <div class="col-1 align-self-center">
            <h1 class="h5 fw-bold">Status</h1>
        </div>
        <div class="col-1 align-self-center">
            <h1 class="h5 fw-bold">Action</h1>
        </div>
    </div></tr>

    <?php
while($r=mysqli_fetch_array($x))
{
    ?>
    <tr   style="cursor:pointer;">
    <div class="d-md-flex d-sm-block justify-content-md-between justify-content-sm-center text-center border-bottom border-2 my-1 bg-light p-2 rounded-3">
        <div class="col-md-1 text-sm-center text-md-start align-self-center my-3+1">
            <h1 class="h6"><?php echo  $r['id']."<br>"; ?></h1>
        </div>
     </td>
    
    
    <div class="col-md-2 text-sm-center text-md-start align-self-center my-">
            <h1 class="h6"><?php echo  $r['Name']."<br>"; ?> </h1>
        </div>
    


    
       
    <div class="col-md-4 text-sm-center text-md-start align-self-center my-2">
            <h1 class="h6"> <?php echo  $r['email']."<br>"; ?></h1>
        </div> 
    
   

        <div class="col-md-1 text-sm-center text-md-start align-self-center my-2">
            <h1 class="" data-role="view" data-id="<?php echo $r['id'];?>"><a onMouseOver="this.style.cursor='pointer';" ><i class="fas fa-eye fa-xs" style="color:green;"></i></a></h1>
        </div> 

   
        <div class="col-md-1 text-sm-center text-md-start align-self-center my-2">
            <h1 class="h6">
            
            <?php
            if($r['status']==0)
            {
            ?>
            <i class="fas fa-ellipsis-h" style="color:green;"></i>
           
            <?php
            }
            else
            {
            ?>
             <i class="fas fa-check" style="color:green;"></i>

                <?php
            }
            ?>

        </h1>
        </div> 
    <div class="col-md-1 text-sm-center text-md-start align-self-center my-2">
            <h1 class="h6"><a href="delete.php?id=<?php echo $r['id'];?>" class="a1"><i class="fas fa-trash-alt" style="color:red;"></i></a></h1>
        </div> 
    </div>
    






       
 

</div>

<?php
}
?>
</table>
<?php
}
else{
    header("location:../../index.html");
}
?>

<script>
$(document).ready(function(){
            $(document).on('click','h1[data-role=view]',function(){
              alert($(this).data('id'));
              var dataid=$(this).data('id');
              $.post('message_view.php',{
                viewid : dataid },
                function(data,status){
                    $('#change-message').html(data);
                })
            });
        });
    </script>

    <script src="admin.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</body>
</html>