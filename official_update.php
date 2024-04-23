<!DOCTYPE html>
<html>

<head>
    <title>UPDATE OFFICIAL</title>
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
            $NAME= filter_input(INPUT_POST, 'NAME');
            $EMAIL = filter_input(INPUT_POST, 'EMAIL');
            $P_NUMBER = filter_input(INPUT_POST, 'P_NUMBER');
            $WNAME = filter_input(INPUT_POST, 'WNAME');
            $ID = filter_input(INPUT_POST, 'ID');
            $POSITION= filter_input(INPUT_POST, 'POSITION');
            $pasword= filter_input(INPUT_POST, 'pasword');
            
            // Update database
            $sql = "UPDATE officials SET NAME ='$NAME', EMAIL='$EMAIL', P_NUMBER='$P_NUMBER', WNAME='$WNAME', ID='$ID', POSITION='$POSITION', pasword='$pasword' WHERE ID='$ID'";


            if ($conn->query($sql) === true) {
                echo "Record updated successfully<BR><a a href='registration_admin.html'><button>Okay</button></a>";
            } else {
                echo "Error updating record "; 
            }
        }
        $conn->close();
    }
    ?>
</body>

</html>