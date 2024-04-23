<!DOCTYPE html>
<html>

<head>
    <title>register members</title>
    <link rel="icon" type="image/x-icon" href="trader.png">
</head>

<body>
    <?php
    $host = "localhost";
    $dbusername = "root";
    $dbpassword = "";
    $dbname = "test";

    $conn = new mysqli($host, $dbusername, $dbpassword, $dbname);

    if (mysqli_connect_error()) {
        die('Connect error (' . mysqli_connect_errno() . ') ' . mysqli_connect_error());
    } else {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $NAME =filter_input(INPUT_POST, 'NAME');
            $EMAIL=filter_input(INPUT_POST, 'EMAIL');
            $P_NUMBER=filter_input(INPUT_POST,'P_NUMBER');
            $BNAME=filter_input(INPUT_POST, 'BNAME');
            $b_number =filter_input(INPUT_POST, 'b_number');
            $location =filter_input(INPUT_POST, 'location');
            $t_number=filter_input(INPUT_POST, 't_number');
            $pasword =filter_input(INPUT_POST, 'pasword');
            
            // Update database
            $sql = "UPDATE registration SET NAME ='$NAME', EMAIL='$EMAIL', P_NUMBER='$P_NUMBER', BNAME='$BNAME', b_number='$b_number', location='$location',t_number='$t_number', pasword='$pasword' WHERE EMAIL='$EMAIL'";


            if ($conn->query($sql) === true) {
                echo "Record updated successfully";
            } else {
                echo "Error updating record "; 
            }
        }
        $conn->close();
    }
    ?>
</body>

</html>