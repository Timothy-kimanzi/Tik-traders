<html>

<head>
    <title>register</title>
    <link rel="icon" type="image/x-icon" href="trader.png">
</head>

<body>
    <?php
         $name= $_POST['NAME'];
         $p_number =$_POST['p_NUMBER'];
         $LOCATION= $_POST['LOCATION'];
         $B_NAME= $_POST['B_NAME'];
         $b_number= $_POST['b_number'];
         $LOCATION= $_POST['B_LOCATION'];
         $t_number= $_POST['t_number'];
         $pasword= $_POST['pasword'];
         $conn = new mysqli('localhost', 'root', '', 'sacco');
         if($conn->connect_error)
            { die('connection failled : '.$conn->connect_error);
         }
         else{
           $stmt =$conn->prepare("insert into regustration(NAME, p_NUMBER, LOCATION, B_NAME, b_number, B_LOCATION, t_number, pasword) values(?, ?, ?, ?, ?, ?, ?, ?)");
           $stmt->bind_param("isisssss", $b_number, $NAME, $p_NUMBER, $LOCATION, $B_NAME, $B_LOCATION, $t_number, $pasword);
           $stmt->execute();
           echo"registration successful...";
           $stmt->close();
           $conn->close();
         }
         ?>
</body>

</html>