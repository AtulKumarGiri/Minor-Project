<?php
include 'connection.php';
session_start();

if($_SESSION['login'] && $_SESSION['teacher']){
$date=date_create(date("Y-m-d"));
// date_add($date,date_interval_create_from_date_string("1 days"));
$dateupto=date_format($date,"Y-m-d");
$query="delete from schedule_class where date<'$dateupto'";
mysqli_query($conn,$query);
$faculty_id=$_SESSION['user']['unique_id'];
$query = "SELECT * FROM schedule_class where faculty_id='$faculty_id' order by date,time";
$result = mysqli_query($conn,$query);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
      .table{
        background:transparent;
      }
      .select select{
        background:transparent;
        width:115px;
        border:none;
        font-weight: bold;
      }
      
    </style>
</head>
<body>

    <div class="SC-form-container" >
      <div class="sc-action">
      </div>
      <div id="change-table">
      <div class="sc-heading" >
      <div class="sc-heading-part">
        <button type="button" class="btn btn-success btn-lg btn-block" id="sc-list" onclick="ScheduleList()" disabled>List of Classes</button>
      </div>
      <div class="sc-heading-part">
        <button type="button" class="btn btn-success btn-lg btn-block" id="sc-new" onclick="ScheduleNew()">New Class</button>
      </div>
</div>
      <div class="table-list" style="overflow-x:auto; overflow-y:auto;">
        
        <table class="table table-hover" id="header-fixed"  >
            <tr class="fixed-row">
                <th style="min-width:80px;">SL No</th>
                <th class="select">
                  <select name="" id="FilterStream" onchange="FilterStream(this.value)">
                    <option value="all" selected>Stream</option>
                    <?php
                      $sql="select * from streams";
                      $q1=mysqli_query($conn,$sql);
                      if (mysqli_num_rows($q1) > 0 ) {
                        while ($row = mysqli_fetch_assoc($q1)) {
                          echo '<option value='.$row['stream'].'>'.$row['stream'].'</option>';
                        }
                      }

                    ?>
                  </select>
                </th>
                <th class="select">
                  <select name="" id="FilterSemester" onchange="FilterSemesterSC(this.value)">
                    <option value="all" selected>Sem</option>
                    <?php
                      $sql="select * from update_sem where sem!='all'";
                      $q1=mysqli_query($conn,$sql);
                      if (mysqli_num_rows($q1) > 0 ) {
                        while ($row = mysqli_fetch_assoc($q1)) {
                          echo '<option value='.$row['sem'].'>'.$row['sem'].'</option>';
                        }
                      }

                    ?>
                  </select>
                </th>
                <th class="select">
                <select name="" id="FilterSection" onchange="FilterSection(this.value)">
                    <option value="all" selected>Section</option>
                    <option value="Alpha">Alpha</option>
                    <option value="Beta">Beta</option>
                    <option value="Combined">Combined</option>
                  </select>
                </th>
                <th class="select">
                <select name="" id="FilterDate" onchange="FilterDate(this.value)">
                    <option value="all" selected>Date</option>
                    <option value="today">Today</option>
                    <option value="tommorow">Tommorrow</option>
                    <option value="week">This Week</option>
                    <option value="month">This Month</option>
                  </select>
                </th>
                <th>Time</th>
            </tr>
            
            <?php
              if (mysqli_num_rows($result) > 0 ) {
                $sl=0;
                while ($row = mysqli_fetch_assoc($result)) {
                    $sl++;
                  ?>
                  <tr data-role="view" data-id="<?php echo $row['id'];?>" style="cursor:pointer;">                    

                    <td><?php echo $sl; ?></td>
                    <td><?php echo $row['stream']; ?></td>
                    <td><?php echo $row['sem']; ?></td>
                    <td><?php echo $row['section']; ?></td>
                    <td><?php $originalDate = $row['date'];
$newDate = date("d-m-Y", strtotime($originalDate)); echo $newDate; ?></td>
                    <td style="min-width:100px;"><?php $time = date("g:i a", strtotime($row['time']));
            echo $time; ?></td>
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
    </div>
    <script>
      function FilterStream(streamget){
            semget=$("#FilterSemester").val();
            sectionget=$("#FilterSection").val();
            dateget=$("#FilterDate").val();
            $.ajax({
              type:'post',
              url: 'scheduleclassfilter.php',
              data : { stream : streamget, date : dateget, sem : semget, section : sectionget , fun : "stream"},
              success : function(data){
                $('#change-table').html(data);
              }

            })
          }
          function FilterSemesterSC(semget){
            streamget=$("#FilterStream").val();
            // semget=$("#FilterSemester").val();

            sectionget=$("#FilterSection").val();
            dateget=$("#FilterDate").val();
            $.ajax({
              type:'post',
              url: 'scheduleclassfilter.php',
              data : { stream : streamget, date : dateget, sem : semget, section : sectionget , fun : "section"},
              success : function(data){
                $('#change-table').html(data);
              }

            })

          }
          function FilterSection(sectionget){
            streamget=$("#FilterStream").val();
            semget=$("#FilterSemester").val();

            // sectionget=$("#FilterSection").val();
            dateget=$("#FilterDate").val();
            $.ajax({
              type:'post',
              url: 'scheduleclassfilter.php',
              data : { stream : streamget, date : dateget, sem : semget, section : sectionget , fun : "section"},
              success : function(data){
                $('#change-table').html(data);
              }

            })
          }
          function FilterDate(dateget){
            streamget=$("#FilterStream").val();
            semget=$("#FilterSemester").val();
            sectionget=$("#FilterSection").val();
            $.ajax({
              type:'post',
              url: 'scheduleclassfilter.php',
              data : { stream : streamget, date : dateget, sem : semget, section : sectionget, fun : "date"},
              success : function(data){
                $('#change-table').html(data);
              }

            })
          }

      $(document).ready(function(){
          





            $('#sc-new').click(function(){
                // $.get('get.html',function(data,status){
                //     $('#changehere').html(data);
                //     alert(status);
                // });
                $.post('scheduleclassform.php',function(data,status){
                    $('#change-scheduleclass').html(data);
                })
            });
            $('#sc-list').click(function(){
                // $.get('get.html',function(data,status){
                //     $('#changehere').html(data);
                //     alert(status);
                // });
                $.post('scheduleclasslist.php',function(data,status){
                    $('#change-scheduleclass').html(data);
                })
            });
            $(document).on('click','tr[data-role=view]',function(){
              // alert($(this).data('id'));
              var dataid=$(this).data('id');
              $.post('scheduleclassview.php',{
                viewid : dataid },
                function(data,status){
                    $('#change-scheduleclass').html(data);
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