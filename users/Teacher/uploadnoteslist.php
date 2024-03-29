<?php
include 'connection.php';
session_start();

if($_SESSION['login'] && $_SESSION['teacher']){


$faculty_id=$_SESSION['user']['unique_id'];
$query = "SELECT * FROM upload_notes where faculty_id='$faculty_id'";
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
    </style>
</head>
<body>
<div class="sc-heading">
      <div class="sc-heading-part">
        <button type="button" class="btn btn-success btn-lg btn-block" id="un-list" onclick="ScheduleList()" disabled>Uploaded Notes</button>
      </div>
      <div class="sc-heading-part">
        <button type="button" class="btn btn-success btn-lg btn-block" id="un-new" onclick="ScheduleNew()">New Notes</button>
      </div>
</div>
<div class="SC-form-container">
  <div id="change-table-UN">
  <div class="table-list" style="overflow-x:auto; overflow-y:auto;">
  <table class="table table-hover">
            <tr class="fixed-row">
                <th style="min-width:80px;">Sl No</th>
                <th class="select">
                  <select name="" id="FilterStreamUN" onchange="FilterStreamUN(this.value)">
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
                  <select name="" id="FilterSemesterUN" onchange="FilterSemesterUN(this.value)">
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
                <select name="" id="FilterSectionUN" onchange="FilterSectionUN(this.value)">
                    <option value="all" selected>Section</option>
                    <option value="Alpha">Alpha</option>
                    <option value="Beta">Beta</option>
                    <option value="Combined">Combined</option>
                  </select>
                </th>
                <th class="select">
                <select name="" id="FilterDateUN" onchange="FilterDateUN(this.value)">
                    <option value="all" selected>Date</option>
                    <option value="today">Today</option>
                    <option value="yesterday">Yesterday</option>
                    <option value="week">Last Week</option>
                    <option value="month">Last Month</option>
                  </select>
                </th>
                <th>Topic</th>
            </tr>
            <?php
          if (mysqli_num_rows($result) > 0 ) {
            $sl=0;
            while ($row1 = mysqli_fetch_assoc($result)) {
                $sl++;
              ?>
              <tr data-role="view" data-id="<?php echo $row1['id'];?>" style="cursor:pointer;">                    

                <th><?php echo $sl; ?></th>
                <td><?php echo $row1['stream']; ?></td>
                <td><?php echo $row1['sem']; ?></td>
                <td><?php echo $row1['section']; ?></td>
                <td><?php $originalDate = $row1['date'];
$newDate = date("d-m-Y", strtotime($originalDate)); echo $newDate; ?></td>
                <td style="min-width:200px;"><?php echo $row1['topic']; ?></td>
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
  // function FilterStreamUN(getstream){
  //       // getstream=document.getElementById("FilterStream");
  //       // console.log(getstream);
  //       dateget=$("#FilterDateUN").val();
  //       $.ajax({
  //         type:'post',
  //         url: 'uploadnotesfilter.php',
  //         data : { stream : getstream, date : dateget},
  //         success : function(data){
  //           $('#change-table-UN').html(data);
  //         }

  //       })
  //     }
  //     function FilterDateUN(dateget){
  //       // getstream=document.getElementById("FilterStream");
  //       // console.log(getstream);
  //       getstream=$("#FilterStreamUN").val();
  //       $.ajax({
  //         type:'post',
  //         url: 'uploadnotesfilter.php',
  //         data : { stream : getstream, date : dateget},
  //         success : function(data){
  //           $('#change-table-UN').html(data);
  //         }

  //       })
  //     }

      function FilterStreamUN(streamget){
            semget=$("#FilterSemesterUN").val();
            sectionget=$("#FilterSectionUN").val();
            dateget=$("#FilterDateUN").val();
            $.ajax({
              type:'post',
              url: 'uploadnotesfilter.php',
              data : { stream : streamget, date : dateget, sem : semget, section : sectionget , fun : "stream"},
              success : function(data){
                $('#change-table-UN').html(data);
              }

            })
          }
          function FilterSemesterUN(semget){
            streamget=$("#FilterStreamUN").val();
            sectionget=$("#FilterSectionUN").val();
            dateget=$("#FilterDateUN").val();
            $.ajax({
              type:'post',
              url: 'uploadnotesfilter.php',
              data : { stream : streamget, date : dateget, sem : semget, section : sectionget , fun : "sem"},
              success : function(data){
                $('#change-table-UN').html(data);
              }

            })
          }
          function FilterSectionUN(sectionget){
            streamget=$("#FilterStreamUN").val();
            semget=$("#FilterSemesterUN").val();

            // sectionget=$("#FilterSection").val();
            dateget=$("#FilterDateUN").val();
            $.ajax({
              type:'post',
              url: 'uploadnotesfilter.php',
              data : { stream : streamget, date : dateget, sem : semget, section : sectionget , fun : "section"},
              success : function(data){
                $('#change-table-UN').html(data);
              }

            })
          }
          function FilterDateUN(dateget){
            streamget=$("#FilterStreamUN").val();
            semget=$("#FilterSemesterUN").val();
            sectionget=$("#FilterSectionUN").val();
            $.ajax({
              type:'post',
              url: 'uploadnotesfilter.php',
              data : { stream : streamget, date : dateget, sem : semget, section : sectionget, fun : "date"},
              success : function(data){
                $('#change-table-UN').html(data);
              }

            })
          }
  $(document).ready(function(){
    $('#un-new').click(function(){
            // $.get('get.html',function(data,status){
            //     $('#changehere').html(data);
            //     alert(status);
            // });
            $.post('uploadnotesform.php',function(data,status){
                $('#change-uploadnotes').html(data);
            })
        });
        $('#un-list').click(function(){
            // $.get('get.html',function(data,status){
            //     $('#changehere').html(data);
            //     alert(status);
            // });
            $.post('uploadnoteslist.php',function(data,status){
                $('#change-uploadnotes').html(data);
            })
        });
        $(document).on('click','tr[data-role=view]',function(){
          // alert($(this).data('id'));
          var dataid=$(this).data('id');
          $.post('uploadnotesview.php',{
            viewid : dataid },
            function(data,status){
                $('#change-uploadnotes').html(data);
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