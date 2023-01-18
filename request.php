<?php
include 'dbconnect.php';
session_start();

        $sql="SELECT *, r.id as request_id FROM `request` as r left JOIN user as u on u.id = r.request_from_id WHERE r.request_to_id  =  '".$_SESSION['id']."' AND request_status='Pending' ";
        $result=mysqli_query($conn,$sql);


?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Request Page</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="//cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>  
    <script src="//cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
</head>

<body>
    <section class="row d-flex justify-content-center align-items-center h-100" style="background-image:  url('hqwe.jpg');">
        <?php include 'nav.php'; ?>
        <h3><?php echo 'Welcome: '.$_SESSION['name']; ?> </h3>
    <div class="container">
      <table class="table" id="myTable">
        <thead>
          <tr>
            <th>id</th>
            <th>Name</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          <?php
            if($result->num_rows > 0) {
              while($row = $result->fetch_assoc()){
               
          ?>
            <tr>
              <td><?php echo $row['id']; ?> </td>
              <td><?php echo $row['name']; ?> </td>
            
              <td>
              
               <div>
                
                
                <a class="btn btn-info" id="accept" href="accept.php?id=<?php echo $row['request_id']; ?>" >Accept </a>&nbsp;<a class="btn btn-danger" href="remove.php?id=<?php echo $row['request_id']; ?>">Remove </a>
               </div>

                
                </td>

            </tr>

            <?php 
                }
              } 
            // } 
            ?>
        </tbody>
      </table>

</div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    </section>
</body>

</html>
<script>
    $(document).ready( function () {
    $('#myTable').DataTable();
    } );
    </script>
