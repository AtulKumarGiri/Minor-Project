<?php
session_start();

if($_SESSION['login'] && $_SESSION['teacher']){

include 'connection.php';

$stream=$_POST['stream'];
$year=$_POST['year'];
if($year=='First')
    $year="First Year";
else if($year=='Second')
    $year="Second Year";
else if($year=='Third')
    $year="Third Year";


$date=$_POST['date'];
$fun=$_POST['fun'];




if($date=='all'){
    $query = "SELECT * FROM updates where stream='$stream' and year='$year' order by id desc";
}
else if($date=='today'){
    $today=date_create(date("Y-m-d"));
    date_add($today,date_interval_create_from_date_string("0 days"));
    $dateupto=date_format($today,"Y-m-d");
    $query = "SELECT * FROM updates where stream='$stream' and year='$year' and date='$dateupto' order by id desc";

}
else if($date=='yesterday'){
    $today=date_create(date("Y-m-d"));
    date_add($today,date_interval_create_from_date_string("-1 days"));
    $dateupto=date_format($today,"Y-m-d");
    $query = "SELECT * FROM updates where stream='$stream' and year='$year' and date='$dateupto' order by id desc";
}
else if($date=='week'){
    $today=date_create(date("Y-m-d"));
    date_add($today,date_interval_create_from_date_string("-7 days"));
    $dateupto=date_format($today,"Y-m-d");
    $query = "SELECT * FROM updates where stream='$stream' and year='$year' and date>='$dateupto' order by id desc";
}
else if($date=='month'){
    $today=date_create(date("Y-m-d"));
    date_add($today,date_interval_create_from_date_string("-30 days"));
    $dateupto=date_format($today,"Y-m-d");
    $query = "SELECT * FROM updates where stream='$stream' and year='$year' and date>='$dateupto' order by id desc";
}






// echo $query;






// $query = "SELECT * FROM updates order by date desc,time desc";
$result = mysqli_query($conn,$query);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="" href="style.css">
    <style>
    .updates-list{
    /* border: 2px solid red; */
    width: 100%;
    height: 450px;
    display: flex;
}
 @media only screen and (max-width: 500px),
 {
  .table { 
		display: flex;
        overflow-x:auto;
	}

    </style>
</head>
<body>
<div class="sc-heading">
      <div class="sc-heading-part">
        <button type="button" class="btn btn-success btn-lg btn-block" id="updates-list" disabled>Updates</button>
      </div>
      <div class="sc-heading-part">
        <button type="button" class="btn btn-success btn-lg btn-block" id="updates-new" >New Update</button>
      </div>
</div>
<div class="updates-list">
   
   <div class="table-list" style="overflow-x:auto;overflow-y:auto;">
        <!-- BCA SEM1 Alpha Date Time View -->
        <table class="table table-hover" id="header-fixed" >
            <tr class="fixed-row">
                <th class="select">
                  <select name="" id="FilterStreamUP" onchange="FilterStreamUP(this.value)">
                    <option value="ALL" <?php if($stream=="ALL"){echo 'selected';} ?>><?php if($stream!="ALL") echo "All Stream"; else echo "Stream"; ?></option>
                    <option value="BCA" <?php if($stream=="BCA"){echo 'selected';} ?>>BCA</option>
                    <option value="BBA" <?php if($stream=="BBA"){echo 'selected';} ?>>BBA</option>
                    <option value="MCA" <?php if($stream=="MCA"){echo 'selected';} ?>>MCA</option>
                    <option value="MSC" <?php if($stream=="MSC"){echo 'selected';} ?>>MSC</option>
                  </select>
                </th>
                <th class="select" >
                  <select style="width:130px" name="" id="FilterYearUP" onchange="FilterYearUP(this.value)">
                    <option value="ALL" <?php if($year=="ALL"){echo 'selected';} ?>><?php if($year!="ALL") echo "All Year"; else echo "Year"; ?></option>
                    <option value="First Year" <?php if($year=="First Year"){echo 'selected';} ?>>First Year</option>
                    <option value="Second Year" <?php if($year=="Second Year"){echo 'selected';} ?>>Second Year</option>
                    <option value="Third Year" <?php if($year=="Third Year"){echo 'selected';} ?>>Third Year</option>
                  </select>
                </th>
                <th style="min-width:300px;"> Title</th>
                <th class="select" style="min-width:200px;">
                <select name="" id="FilterDateUP" onchange="FilterDateUP(this.value)">
                    <option value="all" <?php if($date=="all"){echo 'selected';} ?>><?php if($date!="all") echo "All Date"; else echo "Date"; ?></option>
                    <option value="today" <?php if($date=="today"){echo 'selected';} ?>>Today</option>
                    <option value="yesterday" <?php if($date=="yesterday"){echo 'selected';} ?>>Yesterday</option>
                    <option value="week" <?php if($date=="week"){echo 'selected';} ?>>Last Week</option>
                    <option value="month" <?php if($date=="month"){echo 'selected';} ?>>Last Month</option>
                  </select>
                </th>
            </tr>
            
            <?php
              if (mysqli_num_rows($result) > 0 ) {
                while ($row = mysqli_fetch_assoc($result)) {
                  ?>
                <tr data-role="view" data-id="<?php echo $row['id'];?>" style="cursor:pointer;">                    
                    <td><?php echo $row['stream']; ?></td>
                    <td><?php echo $row['year']; ?></td>
                    <td><?php echo $row['title']; ?></td>
                    <td><?php $originalDate = $row['date'];
$newDate = date("d-m-Y", strtotime($originalDate)); echo $newDate; ?></td>
                </tr>
                <?php
                }
              }
            ?> 
        </table>    
        </div>
        <?php
        
          if (mysqli_num_rows($result) == 0 ){
            ?>
              <p class="text-center">No Records Found.</p>
            <?php
          }
        ?>
</div>



    
    <!-- <marquee behavior="" direction="up" scrolldelay="1" onmouseover="this.stop();" onmouseout="this.start();">
        <a href="">Notification1</a><br>
        <a href="">Notification1</a><br>
        <a href="">Notification1</a><br>
        <a href="">Notification1</a><br>
        <a href="">Notification1</a><br>
        <a href="">Notification1</a><br>
        <a href="">Notification1</a><br>
        <a href="">Notification1</a><br>
        <a href="">Notification1</a><br>
        <a href="">Notification1</a><br>
        <a href="">Notification1</a><br>

    </marquee> -->

    


<script>
function FilterStreamUP(streamget){
            yearget=$("#FilterYearUP").val();
            dateget=$("#FilterDateUP").val();
            $.ajax({
              type:'post',
              url: 'notification_filter.php',
              data : { stream : streamget, date : dateget, year : yearget, fun : "stream"},
              success : function(data){
                $('#change-updates').html(data);
              }

            })
          }
function FilterYearUP(yearget){
            streamget=$("#FilterStreamUP").val();
            dateget=$("#FilterDateUP").val();
            $.ajax({
              type:'post',
              url: 'notification_filter.php',
              data : { stream : streamget, date : dateget, year : yearget, fun : "stream"},
              success : function(data){
                $('#change-updates').html(data);
              }

            })
          }
function FilterDateUP(dateget){
            yearget=$("#FilterYearUP").val();
            streamget=$("#FilterStreamUP").val();
            $.ajax({
              type:'post',
              url: 'notification_filter.php',
              data : { stream : streamget, date : dateget, year : yearget, fun : "stream"},
              success : function(data){
                $('#change-updates').html(data);
              }

            })
          }

    $(document).ready(function(){
        $('#updates-new').click(function(){
            // $.get('get.html',function(data,status){
            //     $('#changehere').html(data);
            //     alert(status);
            // });
            $.post('notificationform.php',function(data,status){
                $('#change-updates').html(data);
            })
        });
        $(document).on('click','tr[data-role=view]',function(){
            // alert($(this).data('id'));
            var dataid=$(this).data('id');
            $.post('notificationview.php',{
            viewid : dataid },
            function(data,status){
                $('#change-updates').html(data);
            })
        });
        $(document).on('click','div[data-role=view]',function(){
            // alert($(this).data('id'));
            var dataid=$(this).data('id');
            $.post('notificationview.php',{
            viewid : dataid },
            function(data,status){
                $('#change-updates').html(data);
            })
        });
    });
</script>
<?php
  }
else{
  header("location:../../index.html");
}
?>
</body>
</html>