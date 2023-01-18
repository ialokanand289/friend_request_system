<?php
include 'dbconnect.php';

if(isset($_POST['action']) && $_POST['action']=='register') {
  $name = $_POST["name"];
  $email = $_POST["email"];
  $password = $_POST["password"];
  $cpassword = $_POST["cpassword"];
  $dob = $_POST["dob"];

  //check exist username
  $existsql = "SELECT * FROM `user` WHERE email='$email'";
  $result = mysqli_query($conn, $existsql);
  $numExistRows = mysqli_num_rows($result);
  if ($numExistRows > 0) {
    $showError = " E-mail is already Exist.";
  } else {

    if ($password == $cpassword) {
      $sql = "INSERT INTO `user`(`id`, `name`, `email`, `password`, `dob`) VALUES (NULL, '$name', '$email', '$password','$dob')";
      $result = mysqli_query($conn, $sql);
      if ($result) {
        $showAlert = true;
      }
    } else {
      $showError = "Password do not match.";
    }
  }
}

?>
<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Sign-up</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>
</head>

<body>
  <section class="row d-flex justify-content-center align-items-center h-100" style="background-image: url('hqwe.jpg');">

    <nav class="navbar navbar-expand-lg navbar-dark  bg-primary">
  <div class="container-fluid">
  <a class="navbar-brand" href="signup.php">
      <img src="logo.png" alt="Logo" width="30" height="24" class="d-inline-block align-text-top">
    
    </a>
    <a class="navbar-brand" href="signup.php">PoKo</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="login.php">Log In</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="admin.php">Admin LogIn</a>
        </li>
  
      </ul>
      <ul class="nav nav-pills">
 
    <li class="nav-item dropdown ">
      <a class="nav-link dropdown-toggle nav-link active" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">Account</a>
      <ul class="dropdown-menu">
        <li><a class="dropdown-item" href="logoff.php">Log off</a></li>
        <li><a class="dropdown-item" href="aboutus.php">About Us</a></li>
    
        <li><a class="dropdown-item" href="#scrollspyHeading5">Settings</a></li>
      </ul>
    </li>
  </ul> 
    </div>
  </div>
</nav>  
    <div class="container my-5">
      <div class="mask d-flex align-items-center h-100 gradient-custom-3">
        <div class="container h-100">
          <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-12 col-md-9 col-lg-7 col-xl-6">
              <div class="card" style="border-radius: 15px;">
                <div class="card-body p-5 ">
                  <h2 class="text-uppercase text-center mb-5">Create an account</h2>



                  <div class="form-outline mb-4">
                    <label class="form-label" for="form3Example1cg">Full Name</label>
                    <input type="text" id="name" name="name" class="form-control form-control-lg" />
                    <div id="name_error" style="display: none; color:red">
                  </div>

                  <div class="form-outline mb-4">
                    <label class="form-label" for="form3Example3cg">Your Email-Id</label>
                    <input type="email" id="email" name="email" class="form-control form-control-lg" />
                    <div id="email_error" style="display: none; color:red">
                  </div>

                  <div class="form-outline mb-4">
                    <label class="form-label" for="form3Example4cg">Password</label>
                    <input type="password" id="password" name="password" class="form-control form-control-lg" />
                    <div id="pass_Error" style="display: none; color:red">
                  </div>

                  <div class="form-outline mb-4">
                    <label class="form-label" for="form3Example4cdg">Repeat your password</label>
                    <input type="password" id="cpassword" name="cpassword" class="form-control form-control-lg" />
                    <div id="cpass_Error" style="display: none; color:red">
                  </div>
                  <div class="form-outline mb-4">
                    <div class="form-outline mb-4">
                      <label for="birthday">Birthday:</label>
                      <input type="date" id="dob" name="dob">
                    </div>

                    <div class="d-md-flex justify-content-start align-items-center mb-4 py-2">

                      <h6 class="mb-0 me-4">Gender: </h6>

                      <div class="form-check form-check-inline mb-0 me-4">
                        <input class="form-check-input" type="radio" name="inlineRadioOptions" id="femaleGender" value="option1" />
                        <label class="form-check-label" for="femaleGender">Female</label>
                      </div>

                      <div class="form-check form-check-inline mb-0 me-4">
                        <input class="form-check-input" type="radio" name="inlineRadioOptions" id="maleGender" value="option2" />
                        <label class="form-check-label" for="maleGender">Male</label>
                      </div>

                      <div class="form-check form-check-inline mb-0">
                        <input class="form-check-input" type="radio" name="inlineRadioOptions" id="otherGender" value="option3" />
                        <label class="form-check-label" for="otherGender">Other</label>
                      </div>

                    </div>

                  </div>

                  <div class="form-check d-flex justify-content-center mb-5">
                    <input class="form-check-input me-2" type="checkbox" value="" id="form2Example3cg" />
                    <label class="form-check-label" for="form2Example3g">
                      I agree all statements in <a href="#!" class="text-body"><u>Terms of service</u></a>
                    </label>
                  </div>




                  <div id="info" style="display: none;">
                    You are successfully signup.
                  </div>
                  <div id="error" style="display: none; color:red">
                  
                  </div>
                  <div class="d-flex justify-content-center">
                    <button type="button" id="submit" name="submit" class="btn btn-success btn-block btn-lg gradient-custom-4 text-body">Register</button>
                  </div>

                  <p class="text-center text-muted mt-5 mb-0">Have already an account? <a href="#!" class="fw-bold text-body"><u>Login here</u></a></p>



                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
  </section>
  </div>


  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>

</html>
<script>
  $(document).ready(function() {
    var emailExp = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    $('#submit').click(function(e) {
      // e.preventDefault();
      var name = $("#name").val();
      var email = $("#email").val();
      var password = $("#password").val();
      var cpassword = $("#cpassword").val();
      var dob = $("#dob").val();
      var error=0;
      if(name==""){
        $("#name_error").show();
        $("#name_error").text('Please fill out this field')
        $("#name_error").delay(3000).fadeOut();
        error++;
      }
      if(email==""){
        $("#email_error").show();
        $("#email_error").text('Please fill out this field')
        $("#email_error").delay(3000).fadeOut();
        error++;
      }
      if(!email.match(emailExp)){
        $("#email_error").show();
        $("#email_error").text('Email format is invalid')
        $("#email_error").delay(3000).fadeOut();
        error++;
      }
      if(password==""){
          $("#pass_Error").show();
          $("#pass_Error").text('Please fill out this field')
          $("#pass_Error").delay(3000).fadeOut();
          error++;
      }
      if(cpassword==""){
          $("#cpass_Error").show();
          $("#cpass_Error").text('Please fill out this field')
          $("#cpass_Error").delay(3000).fadeOut();
          error++;
      }

      if(password != cpassword ){
        $("#error").show();
        $("#error").text('Password and confirm password should be same')
        $("#error").delay(3000).fadeOut();
        error++;
      }

      if (error==0){
        $.ajax({
          type: "post",
          data: {
           
            name: name,
            email: email,
            password: password,
            cpassword: cpassword,
            dob: dob
          },
  
          success: function(data) {
            $("#name").val("");
            $("#email").val("");
            $("#password").val("");
            $("#cpassword").val("");
            $("#dob").val("");
  
            $("#info").show();
            $("#info").delay(3000).fadeOut();
            // alert('inserted successfully')
          }
        })

      }
  

    })
  })
</script>