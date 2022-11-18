<?php
session_start();
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
    <link rel="stylesheet" type="" href="style.css">
    <title>Updates</title>
    <link rel="shortcut icon" href="../../images/logo.png" />

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=El+Messiri&family=Great+Vibes&family=Raleway:wght@300&display=swap" rel="stylesheet">
    <style>
    .modal-dialog {
    top: 10%;
    }
    </style>
</head>
<body>
<?php
  if($_SESSION['login'] && $_SESSION['teacher']){
?>
    <!-- <div class="back">
      <h2><a href="index.php">Go to Database</a></h2>
    </div> -->
    
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header"width="40px;">
                    <div class="sc-header-logo">
                        <a href="index.php"><img src="../../images/logo.png" alt="TihCollegeSpace"></a>
                     </div>
                     <div class="sc-header-name ">
                        <a href="Updates.php"><h2>Updates</h2></a>
                     </div>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                 </div> 
                    <div class="modal-body mx-auto px-3">
                    </div>
                  <!--<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>-->
            </div>
        </div>

    <script src="admin.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

<?php
  }
else{
  header("location:../../index.html");
}
?>
</body>
</html>