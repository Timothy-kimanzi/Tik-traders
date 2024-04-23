<?php
 $b_s= $_POST['b_s'];
 $pasword = $_POST['pasword'];
 $conn= new mysqli('localhost', 'root', '', 'test');
 if($conn->connect_error)
            { die('connection failled : '.$conn->connect_error);
         }
         else{
           $stmt =$conn->prepare ("insert into login(b_s, pasword) values(?, ?,)" );
           $stmt->bind_param("is", $b_s, $pasword);
           $stmt->execute();
           echo"registration successful...";
           $stmt->close();
           $conn->close();
         }
?>