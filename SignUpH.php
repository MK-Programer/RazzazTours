<?php
include("classes/Person.php");
$register = new Person();
if (isset($_POST['register'])) {
    $register->register($_POST);
    $error = $register->get_errors();
}
?>
<!DOCTYPE html>
<html>
<head>

  <link rel="stylesheet" href="SignUp.css">
  

</head>
<body>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js">
    
</script>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> 

<div class="signup-form"> 

<form method="post">
    
 <h1>Sign Up</h1>

  <p id="p">Please fill in this form to create a new account.</p>
  <hr>
    <div class="text-left w-100 mb-4 ml-3">
                            <p class="text-green h3 font-weight-bold text-uppercase">Create an Account</p>
                            <?php
                            if (isset($error)) {
                                foreach ($error as $e) { ?>
                                    <div class='alert alert-danger alert-dismissible col-md-10 ml-4 mt-1'>
                                        <button type='button' class='close' data-dismiss='alert'>&times;</button>
                                        <?php echo $e; ?>
                                    </div>
                            <?php }
                            } ?>



                        </div>

<div class="form-group">
            <div class="row">

        <div class="col-xs-8">
        <input type="text" placeholder="Enter Your First Name" name="firstname" class="form-control" required> </div>
            </div>          
        </div>

     <div class="form-group">

     <input type="text" placeholder="Enter Your Last Name" name="lastname" class="form-control" required>

     </div>

     <div class="form-group">
     <input type="email" placeholder="Enter Email" name="email" class="form-control"required>
     </div>

    
    <div class="form-group">
    <input type="number" placeholder="Enter Your Number" name="number" class="form-control" maxlength="11" required>
    </div>


    <div class="form-group">
    <input type="password" placeholder="Enter Password" name="password" class="form-control" required>
    </div>

    <div class="form-group">
    <input type="password" placeholder="Repeat Password" name="confirm_password" class="form-control" required>
    </div>

    <span id='message' ></span><br><br>

    <div class="form-group">
    Male<input type="radio" name="gender" value="male" class="form-radio"required> 
    
    Female<input type="radio" name="gender" value="female" class="form-radio"required> 
    </div>


    <div class="form-group">
    <label class="checkbox-inline"> <input type="checkbox" required>
    By creating an account you must agree to our <a href="#">Terms & Privacy</a>.</label> 
    </div>




    <div class="form-group">
      <input type="Submit" value="Submit" name="register" class="btn btn-primary btn-lg">
    </div>


    </form>

<div class="hint-text">Already have an account? <a href="SignInH.php">Login here</a></div>
  
</div>

</body>

</html>