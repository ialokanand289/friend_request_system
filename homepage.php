<?php
session_start();
include 'dbconnect.php';
if(!isset($_SESSION['id'])){
  header("location:login.php");
}
$sql= "SELECT * FROM `user` WHERE id != '".$_SESSION['id']."'";
$result=mysqli_query($conn,$sql);
if(isset($_POST['action']) && $_POST['action']=='send_request'){
  // print_r($_POST);
  // exit;
  $receiver_id = $_POST['to_id'];
  $sql=" SELECT * FROM `request` WHERE request_from_id = '".$_SESSION['id']."' AND request_to_id = '$receiver_id'";
  $result=mysqli_query($conn,$sql);
  if(mysqli_num_rows($result)> 0){
    echo "Request Already send";
  }else{
    $sql=" INSERT INTO `request` (`id`, `request_from_id`, `request_to_id`, `request_status`, `request_datetime`) VALUES (NULL, '".$_SESSION['id']."', '$receiver_id', 'Pending', current_timestamp())";
    $result=mysqli_query($conn,$sql);
  exit;
}
}
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> HomePage</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="//cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">
    <script src="//cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
  <body>
  <section class="row d-flex justify-content-center align-items-center h-100" style="background-image: url('hqwe.jpg');">
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
                // $fetch[] = $row;
                // foreach($fetch as $data){
                //   echo '<pre>';
                // print_r($data);
                // exit;
          ?>
            <tr>
              <td><?php echo $row['id']; ?> </td>
              <td><?php echo $row['name']; ?> </td>
              <td>
              
               <div class="sent_<?php echo $row['id']?>">
                
                
                <a class="btn btn-info hide_<?php echo $row['id']?> send_request" data-id= "<?php echo $row['id']; ?>">Add Friend </a>&nbsp;<a class="btn btn-danger send_request" >Remove</a>
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
  </body>
 
</html>
<script>
    $(document).ready( function () {
    $('#myTable').DataTable({
      dom: 'Bfrtip'
    });
    });
    </script>
<script>
  $(document).ready(function(){
    console.log($('.send_request'));
    $('.send_request').click(function(){
      var to_id =  $(this).data('id');
        console.log(to_id);
      // var action='send_request';
     
      if(to_id > 0){
        $.ajax({
          type: 'post',
          data: {
            to_id:to_id,
            action:'send_request'
          },
          beforeSend:function()
          {

            $('.btn btn-info_'+to_id).attr('disabled', 'disabled');
            $('.btn btn-info_'+to_id).html('<i class="fa fa-circle-o-notch fa-spin"></i> Sending...');
          },
          success: function(data){

            $('.hide_'+to_id).hide();
            
            $('.sent_'+to_id).html('<i class="fa fa-clock-o" aria-hidden="true"></i> Request Send');
          }
          
        })
      }
    })  
  })
</script>

