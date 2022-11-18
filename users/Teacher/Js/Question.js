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
  
  