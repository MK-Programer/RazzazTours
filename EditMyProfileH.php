<!DOCTYPE html>

<html>
<head>
  <div>
   
</div>
  <title>Bootstrap Example</title>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

  
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  
    <link rel="stylesheet" href="EditProfile.css">
</head>
<script>
    $(document).ready(function(){
// Prepare the preview for profile picture
    $("#wizard-picture").change(function(){

      if(this.files[0].size > 3201024){
       alert("File is too big!");
       this.value = "";
    }
    else{  
     readURL(this);
    }

    });
});
function readURL(input) {
    var fileInput = document.getElementById('wizard-picture'); 
  
     if(fileInput.files && fileInput.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
          
            $('#wizardPicturePreview').attr('src', e.target.result).fadeIn('slow');
     
        
      
        reader.readAsDataURL(fileInput.files[0]);
      }

    }
 
}
</script>


<body>


<div class="container bootstrap snippet" style="margin-top: 10%;">

    <div class="row">
      <div class="col-sm-10" id="h"><h1>Profile</h1></div>
     <!--  -->
    </div>
    <div class="row">

<form id="upload"action="EditMyProfile.php" method="post" enctype="multipart/form-data">
   
    
    
      <div class="col-sm-3"><!--left col-->
              

      <div class="picture-container">
        <div class="picture">
            <img src="unnamed.png" class="picture-src" id="wizardPicturePreview" title="">
            <input type="file" id="wizard-picture" accept="image/*" name="image">
        </div>
         <h6 class="">Change Picture (max size 3Mb)</h6>

    </div><br>
   <button class="btn btn-info" id="up" type="submit" name="submit" value="Upload">Upload</button>
</form>
  
        </div><!--/col-3-->
<form class="form" action="#" method="post" id="info-Form">
      <div class="col-sm-9" id="c">
           
         

            <div class="tab-pane active" id="home">
                <hr>
              </hr>
                  
                      <div class="form-group">
                          
                          <div class="col-xs-6">
                              <label for="first_name"><h4>First name</h4></label>
                              <input type="text" class="form-control" name="first_name" id="first_name" placeholder="first name" title="enter your first name if any.">
                          </div>
                      </div>
                      <div class="form-group">
                          
                          <div class="col-xs-6">
                            <label for="last_name"><h4>Last name</h4></label>
                              <input type="text" class="form-control" name="last_name" id="last_name" placeholder="last name" title="enter your last name if any.">
                          </div>
                      </div>
          
                      <div class="form-group">
                          
                          <div class="col-xs-6">
                            <label for="mobile"><h4>Mobile</h4></label>
                              <input type="text" class="form-control" name="mobile" id="mobile" placeholder="enter mobile number" title="enter your mobile number if any.">
                              
                          </div>
                      </div>
          
                      <div class="form-group">
                          <div class="col-xs-6">
                             <label for="email"><h4>Email</h4></label>
                              <input type="email" class="form-control" name="email" id="email" placeholder="you@email.com" title="enter your email.">
                          </div>
                      </div>
                      <div class="form-group">
                          
                          <div class="col-xs-6">
                              <label for="password"><h4>Password</h4></label>
                              <input type="password" class="form-control" name="password" id="password" placeholder="password" title="enter your password.">
                          </div>
                      </div>
                      
                      <div class="form-group">
                          
                          <div class="col-xs-6">
                            <label for="password2"><h4>New Password</h4></label>
                              <input type="password" class="form-control" name="password2" id="confirm_password" placeholder="password2" title="enter your password2.">
                          </div>
                      </div>
                      <div class="form-group">
                           <div class="col-xs-12">
                                <br>
                                <button class="btn btn-lg btn-success" id="s" type="submit"> Save</button>
                                <button class="btn btn-lg" type="reset"> Reset</button>
                                <span id='message'></span>
                            </div>
                      </div>
                </form>
              
             
              
             
               
              
          </div><!--/tab-content-->

        </div><!--/col-9-->
    </div><!--/row-->
      </div>

</body>
<script>
 
$( document ).ready(function() {

$("#upload").on('submit',(function(e) {
  e.preventDefault();
  var formdata = new FormData(this);
  formdata.append("functioncall", "photo");
  $.ajax({
         url: "EditMyProfile.php",
   type: "POST",
   data: formdata,
   contentType: false,
         cache: false,
   processData:false,
   success:function(results) { 

   alert(results);
        
        },
        error: function(xhr, status, error) {
 console.error(xhr);
 alert("error");
 }

         });
}));

$.ajax({ 
           
           method: "GET", 
           url: "EditMyProfile.php",
           data: {"functioncall": "loadprofile"},
           dataType:'json',
           success:function(results) { 
          // alert(results);
          // console. log(results);
          var result = results;
          $.each( result, function( key, value ) { 


            document.getElementById("first_name").value = value['First Name'];
            document.getElementById("last_name").value = value['Last Name'];
            document.getElementById("mobile").value = value['Number'];
            document.getElementById("email").value = value['Email'];
            document.getElementById("password").value = value['Password'];
            document.getElementById("confirm_password").value = value['Password'];
            $('#wizardPicturePreview').attr('src', value['Picture']).fadeIn('slow');

                 });  
        }

         });



  $('#password, #confirm_password').on('keyup', function () {
  if ($('#password').val() == $('#confirm_password').val() && $('#password').val() !="" ) {
    $('#message').html('Matching').css('color', 'green');
    

  } else 
    $('#message').html('Not Matching').css('color', 'red');
});




       });

$( "#s" ).click(function() {

var flag = $('#message').html();


if(flag == "Matching"|| flag == ""){
  var first_name = document.getElementById("first_name").value;
  var last_name = document.getElementById("last_name").value;
  var mobile = document.getElementById("mobile").value;
  var email = document.getElementById("email").value;
  var password = document.getElementById("password").value;
  
if(first_name == "" || last_name == "" ||mobile == "" ||email == "" ||password == ""){

  alert("Please fill in the required information ")
}
else{
$.ajax({ 
           method: "POST", 
           url: "EditMyProfile.php",
           data: {functioncall: 'editprofile',first_name : first_name, last_name : last_name,mobile: mobile,email : email, password : password},
           success:function(results) { 
            alert(results);
        }

         });
}
}else{alert("Not Matching password");}
});

    </script>
</html>