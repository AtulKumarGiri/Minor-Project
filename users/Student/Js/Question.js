function FilterStream(id){
    let Semester = $('#FilterSemester');
    let semdata = "semester";
    let semid = id;
    Semester.empty().append('<option selected="selected" value="0" disabled = "disabled">Loading.....</option>'); 
    $.ajax({
      type: "POST",
      url: 'myAjax.php',
      data: {semid:semid,semdata:semdata},
      dataType: "json",
      success : function(data){
        console.log(data);
        Semester.empty().append('<option selected="selected" value="0">Select Semester</option>');
        $.each(data, function(key,value) {
                 Semester.append($("<option></option>").val(value['id']).html(value['sem']));
                 });
      }

    })
  }
  
  function filtersubject(id){
    console.log(id);  

    let Subject = $('#FilterSubject');
    let semdata = "subject";
    let semid = id;
    Subject.empty().append('<option selected="selected" value="0" disabled = "disabled">Loading.....</option>'); 
    $.ajax({
      type: "POST",
      url: 'myAjax.php',
      data: {semid:semid,semdata:semdata},
      dataType: "json",
      success : function(data){
        console.log(data);
        Subject.empty().append('<option selected="selected" value="0">Select Subject</option>');
        $.each(data, function(key,value) {
                 Subject.append($("<option></option>").val(value['id']).html(value['subject']));
                 });
      }

    })
  }

  function paperquest(id){
    var stream =   $('#FilterCourse :selected').val();
    var semester = $('#FilterSemester :selected').val();
    var subject = $('#FilterSubject :selected').val();
    var year = $('#year :selected').val();
    var semdata = "paper";
    var paper = $('#paperfilter');
    $.ajax({
      type: "POST",
      url: 'myAjax.php',
      data: {stream:stream,semester:semester,subject:subject,year:year,semdata:semdata},
      dataType: "json",
      success : function(data){
        if(data.success)
        {
           alert("Paper Founded..!");
           paper.html(data.data);  
        }
        else{
           alert("Paper Not Founded..!");
           paper.html(data.data);   
        }
        //   if(data['stream'] != "" && data['sem'] != "" && data['subject'] != "" && data['year'] != "" )
        //   {
            
        //        if(data['question_paper'] != null)
        //        {
        //         alert("Paper Founded..!"); 
        //         paper.html()
        //         // paper.empty().append('<tr></tr>');
        //         // console.log(data);
        //         // paper.append($("<tr>"));
        //         // //  paper.append($("<th></th>").html("1"));
        //         // paper.append($("<td></td>").html(data['stream']));
        //         // paper.append($("<td></td>").html(data['sem']));
        //         // paper.append($("<td></td>").html(data['subject']));
        //         // paper.append($("<td></td>").html(data['year']));
        //         // paper.append($("<td>").html('<a href="../Teacher/QuestionPaper/'+data['question_paper']+'" class="btn btn-info btn-sm" target="_blank">Download</a>'));
        //         // paper.append($("</td>"));
        //         // paper.append($("</tr>"));
           
        //        }
        //        else
        //        {
        //        alert("Paper Not Found..");
        //     //    paper.empty().append('<tr></tr>');
        //     //    paper.append($("<tr>")); 
        //     //    paper.append($("<td colspan='5' class='text-danger text-center'></td>").html(data['found']));
        //     //    paper.append($("</tr>"));
        //        }
             
             
        //   }
        //   else
        //   {
        //     alert("Please Select Dropdown Option");
        //   }
           
      }

    });
 }
  
  /*

  function FetchSubject(id){ 
    $('#subject').html('');
    $.ajax({
      type:'post',
      url: 'ajaxdata.php',
      data : { semester_id : id},
      success : function(data){
         $('#subject').html(data);
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
        });
        
        
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
          function FilterSemester(getsem){
            streamget=$("#FilterStream").val();
            sectionget=$("#FilterSection").val();
            dateget=$("#FilterDate").val();
            $.ajax({
              type:'post',
              url: 'scheduleclassfilter.php',
              data : { stream : streamget, date : dateget, sem : semget, section : sectionget , fun : "sem"},
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
        */