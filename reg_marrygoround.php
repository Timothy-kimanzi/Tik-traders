<!DOCTYPE html>
<html>

<head>
    <title>register to marry go round</title>
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
        die('connect error (' . mysqli_connect_errno() . ') ' . mysqli_connect_error());
    } else {
        $email = filter_input(INPUT_POST, 'email');
        $name = filter_input(INPUT_POST, 'name');
        $phone_number = filter_input(INPUT_POST, 'phone_number');
        $business_number = filter_input(INPUT_POST, 'business_number');

        // Check if email already exists
        $check_reg_query = "SELECT * FROM registration WHERE email='$email'";
        $check_reg_result = $conn->query($check_reg_query);

        if ($check_reg_result && $check_reg_result->num_rows > 0) {
            // Check if email already exists in beneficially table
            $check_email_query = "SELECT * FROM beneficially WHERE email='$email'";
            $check_email_result = $conn->query($check_email_query);

            if ($check_email_result->num_rows > 0) {
                echo "Email already exists. Please try again with a different email.<br><a href='reg_marrygoround.html'><button>Try Again</button></a>";
            } else {
                $sql = "INSERT INTO beneficially (email, `name`, phone_number, business_number) VALUES ('$email','$name', '$phone_number', '$business_number')";
                if ($conn->query($sql)) {
                    echo "Registration is completed successfully<br><a href='traders.html'><button>OKAY</button></a>";
                } else {
                    echo "Error<br><a href='reg_marrygoround.html'><button>Try Again</button></a>";
                }
            }
        } else {
            // Email is not registered
            echo "You are not a registered member. Please register.<br><a href='register.html'><button>Register</button></a>";
        }
        $conn->close();
    }
    ?>
</body>

</html>