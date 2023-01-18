<?php
session_start();
include 'dbconnect.php';
if (isset($_POST['action']) && $_POST['action'] == 'login') {



    $error = 0;
    $email = $_POST["email"];
    $password = $_POST["password"];

    $sql = "SELECT * FROM `user` WHERE email='$email' AND password ='$password'";
    $result = mysqli_query($conn, $sql);
    $num = mysqli_num_rows($result);
    $row = mysqli_fetch_assoc($result);
    // print_r($row);
    // exit;

   
    if ($num == 1) {
        echo "success";
        // while ($row) {
            $_SESSION['email'] = $row['email'];
            $_SESSION['id'] = $row['id'];
            $_SESSION['name'] = $row['name'];
            
        // }
    } else {

        echo "fail";
    }
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>
</head>

<body>
    <section class="row d-flex justify-content-center align-items-center h-100" style="background-image: url('hqwe.jpg');">

        <?php include 'nav.php';  ?>
        <div class="container my-5">
            <div class="mask d-flex align-items-center h-100 gradient-custom-3">
                <div class="container h-100">
                    <div class="row d-flex justify-content-center align-items-center h-100">
                        <div class="col-12 col-md-9 col-lg-7 col-xl-6">
                            <div class="card" style="border-radius: 15px;">
                                <div class="card-body p-5 ">
                                    <h2 class="text-uppercase text-center mb-5">Log -In to Acoount</h2>

                                    <div class="form-outline mb-4">
                                        <input type="email" id="email" name="email" class="form-control form-control-lg" />
                                        <label class="form-label" for="form3Example3cg">Your Email-Id</label>
                                    </div>

                                    <div class="form-outline mb-4">
                                        <input type="password" id="password" name="password" class="form-control form-control-lg" />
                                        <label class="form-label" for="form3Example4cg">Password</label>
                                    </div>
                                    <div id="info" style="display: none;">
                                        Wrong Credential
                                    </div>
                                    <div class="d-flex justify-content-center">
                                        <button type="button" id="button" name="button" class="btn btn-success btn-block btn-lg gradient-custom-4 text-body">Log In</button>
                                    </div>

                                    <p class="text-center text-muted mt-5 mb-0">Sign up First <a href="signup.php" class="fw-bold text-body"><u>Signup here</u></a></p>

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
<script>
    $(document).ready(function() {
        $("#button").click(function() {
            var email = $('#email').val();
            var password = $('#password').val();
            var error = 0;
            if (email == "" || password == "") {
                alert("please filled all the field");
                error++;
            }




            if (error == 0) {
                $.ajax({
                    type: 'POST',
                    data: {
                        email: email,
                        password: password,
                        action: 'login'
                    },
                    success: function(data) {

                        console.log(data);
                        if (data == "success") {
                            window.location.href = 'homepage.php';
                        } else {
                            $("#info").show();
                            $("#info").delay(3000).fadeOut();
                        }
                    }
                });



            }
        });



    });
</script>

</html>