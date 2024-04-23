<!DOCTYPE html>
<html>

<head>
    <title>marry go round</title>
    <link rel="icon" type="image/x-icon" href="trader.png">
</head>

<body>
    <?php
                    $host ="localhost";
                $dbusername="root";
                $dbpassword="";
                $dbname="test";
                $conn = new mysqli ($host, $dbusername, $dbpassword, $dbname);
                if (mysqli_connect_error()){
                    die('connect error ('.mysqli_connect_errno().') '.mysqli_connect_error());
                }
                else{ $email =filter_input(INPUT_POST, 'email');
                    $business_number=filter_input(INPUT_POST, 'business_number');
                    $group=filter_input(INPUT_POST,'group');
                    $phone_number=filter_input(INPUT_POST, 'phone_number');
                    $amount =filter_input(INPUT_POST, 'amount');
                    $code =filter_input(INPUT_POST, 'code');
                    $pasword =filter_input(INPUT_POST, 'pasword');
                    $check_reg_query = "SELECT * FROM beneficially WHERE email='$email'";
                    $check_reg_result = $conn->query($check_reg_query);
            
                    if ($check_reg_result && $check_reg_result->num_rows > 0) {
                    $sql = "INSERT INTO marry_go_round  ( email, business_number, `group`, phone_number, amount, code, pasword) values('$email', '$business_number', '$group', '$phone_number', '$amount', '$code', '$pasword')";
                    if($conn->query($sql)){
                        $sql2="INSERT INTO marry_receipt (email, phone_number,amount, code) VALUES('$email', '$phone_number','$amount','$code')";
                        if($conn->query($sql2)){
                            echo"recorded successfully<br>";
                        }
                        else{
                            echo"not recorded";
                        }
                        echo "contributed is complited succesfully<br><a href='traders.html'><button>OKAY</button></a>";
                    }
                    else{
                        echo "error <br><a href='contribution.html'><button
                        >Try again</button></a>";
                    }} else {
                        // Email is not registered
                        echo "You are not a registered as a beneficiary of marry go round. Please register.<br><a href='reg_marrygoround.html'><button>Register</button></a>";
                    }
                    $conn->close();
                }
        ?>
</body>

</html>