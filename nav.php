
<nav class="navbar navbar-expand-lg navbar-dark  bg-primary">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">
            <img src="logo.png" alt="Logo" width="30" height="24" class="d-inline-block align-text-top">
        </a>
        <a class="navbar-brand" href="#">PoKo </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                       
                <?php if(isset($_SESSION['name'])){   ?>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="homepage.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="request.php">Request</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="friend_list.php">Friend List</a>
                    </li>
                    
                <?php }else{ ?>
                    <li class="nav-item">
                        <a class="nav-link active" href="login.php">Log In</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="signup.php">Sign Up</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="admin.php">Admin LogIn</a>
                    </li>
                </ul>
                <?php } ?>
            

                           
            <?php if(isset($_SESSION["name"]))  { ?>        
            <ul class="nav nav-pills">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle nav-link active" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">Account</a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="logout.php">Log off</a></li>
                        <li><a class="dropdown-item" href="aboutus.php">About Us</a></li>

                        <li><a class="dropdown-item" href="#scrollspyHeading5">Settings</a></li>
                    </ul>
                </li>
            </ul>

            <?php } ?>
         
                
        </div>
    </div>
</nav>