<!DOCTYPE html>
<html>

<head>
    <title>advertisement</title>
    <link rel="icon" type="image/x-icon" href="trader.png">
</head>

<body>
    <?php
        $email =filter_input(INPUT_POST, 'email');
        $advertisement_p_reason=filter_input(INPUT_POST, 'advertisement_p_reason');
        $business_number=filter_input(INPUT_POST,'business_number');
        $penalty=filter_input(INPUT_POST, 'penalty');
                $host ="localhost";
                $dbusername="root";
                $dbpassword="";
                $dbname="test";
                $conn = new mysqli ($host, $dbusername, $dbpassword, $dbname);
                if (mysqli_connect_error()){
                    die('connect error ('.mysqli_connect_errno().') '.mysqli_connect_error());
                }
                else{
                    $sql = "INSERT INTO penalty ( email, advertisement_p_reason, business_number, penalty) values('$email', '$advertisement_p_reason', '$business_number', '$penalty')";
                    if($conn->query($sql)){
                        echo "penalty is given successfully";
                    }
                    else{
                        echo "error".$sql."<br".$conn->error;
                    }
                    $conn->close();
                }
        ?>
</body>

</html>