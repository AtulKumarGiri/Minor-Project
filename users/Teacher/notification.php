<?php
session_start();

if($_SESSION['login'] && $_SESSION['teacher']){

include 'connection.php';
$query = "SELECT * FROM updates order by id desc";
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
        <table class="table table-hover" id="header-fixed" >
            <tr class="fixed-row">
                <th class="select">
                    <select id="FilterStreamUP" onchange="FilterStreamUP(this.value)">
                    <?php
                      $sql="select * from update_streams";
                      $q1=mysqli_query($conn,$sql);
                      if (mysqli_num_rows($q1) > 0 ) {
                        while ($row = mysqli_fetch_assoc($q1)) {
                            if($row['stream']=='ALL')
                            {
                                echo '<option value='.$row['stream'].' selected >'.Stream.'</option>';   
                            }
                            else{
                                echo '<option value='.$row['stream'].'>'.$row['stream'].'</option>';
                            }
                        }
                      }

                    ?>
                    </select>
                </th>
                <th class="select" >
                    <select style="width:130px" id="FilterYearUP" onchange="FilterYearUP(this.value)">
                    <?php
                      $sql="select * from years where id=11 or (id>=1 and id<=3)";
                      $q1=mysqli_query($conn,$sql);
                      if (mysqli_num_rows($q1) > 0 ) {
                        while ($row = mysqli_fetch_assoc($q1)) {
                            if($row['year']=='ALL')
                            {
                                echo '<option value='.$row['year'].' selected >'.Year.'</option>';   
                            }
                            else{
                                if($row['year']!='ALL')
                                echo '<option value='.$row['year'].'>'.$row['year'].'</option>';
                            }
                        }
                      }

                    ?>
                    </select>
                </th>
                <th style="min-width:300px;"> Title</th>
                <th class="select" style="min-width:200px;">
                <select name="" id="FilterDateUP" onchange="FilterDateUP(this.value)">
                    <option value="all" selected>Date</option>
                    <option value="today">Today</option>
                    <option value="yesterday">Yesterday</option>
                    <option value="week">Last Week</option>
                    <option value="month">Last Month</option>
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