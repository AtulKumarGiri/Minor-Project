<!DOCTYPE html>

        <html lang="en">

        <head>

            <meta charset="UTF-8">

            <meta http-equiv="X-UA-Compatible" content="IE=edge">

            <meta name="viewport" content="width=device-width, initial-scale=1.0">

            <title>Email Verification</title>

            <link rel="stylesheet" href="style.css">

            <style>

                

                ol{

                    width: auto;

                    height: 100px;

                }

                ol li{

                    width: 100px;

                    height: 50px;

                    background: yellow;

                    float: left;

                    margin-left: 10px;

                    list-style-type: none;

                    padding-top: 15px;

                    text-align: center;

                    border-radius: 10px;

                    animation: ;

                }

                ol li a{

                    text-decoration: none;

                    color: black;

                }

            

            </style>

        </head>

        <body>

            <form method="post" id="otp_form">

                <div class="wrapper">

                    <div class="title">

                        Registration Form

                    </div>

                    <div class="form">

                        <div id="Student_details">

                            <h2>Email Verification</h2>

                            <div class="input_field">

                                <label>Enter the OTP</label>

                                <input type="text" id="otp" name="otp" class="input" required>

                            </div>

                        <div class="input_field">

                            <input type="button" id="submit" name="submit" value="submit" class="btn" onclick="submitOtp()">

                        </div>

                        <div id="message">

                        </div>



                    </div>

                </div>

            </form>

        </body>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

        <script>

        function submitOtp(){

            console.log("Helo");

            var otp = jQuery('#otp').val();

            console.log(otp)

            jQuery.ajax({

                url:'otp_verification.php',

                type:'post',

                data:'otp='+otp,

                success:function(result){
                    if(result=='admin'){

                        window.location='admin_form.php';

                    }
                    if(result=='teacher'){

                        window.location='teacher_form.php';

                    }

                    if(result=='student'){

                        window.location='student_form.php';

                    }
                    
                    if(result=='no'){

                        jQuery('#error').html('please enter a valid otp');

                    }

                }

            });

        }

        

    function save_data(){

        var form_element = document.getElementsByClassName('input');



        var form_data = new FormData();



        for(var c = 0 ; c < form_element.length ; c++) {

            form_data.append(form_element[c].name, form_element[c].value);

        }

        document.getElementById('submit').disabled = true;



        var ajax_request = new XMLHttpRequest();



        ajax_request.open('POST', 'otp_verification.php');



        ajax_request.send(form_data);



        ajax_request.onreadystatechange = function(){

            

            if(ajax_request.readyState == 4 && ajax_request.status == 200){

                document.getElementById('submit').disabled = false;



                document.getElementById('otp_form').reset();



                document.getElementById('message').innerHTML = ajax_request.responseText;

                

                setTimeout(()=>{

                    document.getElementById('message').innerHTML = '';

                }, 5000);

            }

        }

    }





        </script>



        </html>