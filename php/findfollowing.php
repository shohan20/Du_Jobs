<?php
  session_start();
    include 'serverConnection.php';
    $id=$_SESSION['id'];
    $connection=serverConnect();
    //$connection= mysqli_connect("localhost", "root", "abcd");
   $found=array();
    $result=mysqli_query($connection, "select * from  follow inner join userinfo on follow.follow_to=userinfo.user_id where follow_by='$id'");
    if(mysqli_num_rows($result)>0){
    
      while($row= mysqli_fetch_assoc($result)){
            $found[]=$row;
      }
      echo json_encode($found); 
   
  }
?>