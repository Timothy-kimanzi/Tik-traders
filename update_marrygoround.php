<!DOCTYPE html>
<html>

<head>
    <title>marry go round</title>
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
            $email = filter_input(INPUT_POST, 'email');
            $name = filter_input(INPUT_POST, 'name');
            $phone_number = filter_input(INPUT_POST, 'phone_number');
            $business_number = filter_input(INPUT_POST, 'business_number');
            // Update database
            $sql = "UPDATE beneficially SET email ='$email', name='$name', phone_number='$phone_number', business_number='$business_number'";


            if ($conn->query($sql) === true) {
                echo "Record updated successfully.<br><button><a href='beneficialy_order.php'>Okay</a></button>";
            } else {
                echo "Error updating record.<br><button><a href='update_beneficiry.html'>Try Again</a></button> "; 
            }
        }
        $conn->close();
    }
    ?>
</body>

</html>