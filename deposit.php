<!DOCTYPE html>
<html>

<head>
    <title>Deposit</title>
    <link rel="icon" type="image/x-icon" href="trader.png">
</head>

<body>
    <?php
    // Get user inputs
    $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
    $pasword = filter_input(INPUT_POST, 'pasword');

    // Database connection parameters
    $host = "localhost";
    $dbusername = "root";
    $dbpassword = "";
    $dbname = "test";

    // Create connection
    $conn = new mysqli($host, $dbusername, $dbpassword, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die('Connection failed: ' . $conn->connect_error);
    }

    // Check if the email is registered
    $check_reg_query = "SELECT * FROM registration WHERE email='$email'";
    $check_reg_result = $conn->query($check_reg_query);

    if ($check_reg_result && $check_reg_result->num_rows > 0) {
        // Check if the email is already registered for saving
        $check_query = "SELECT * FROM `save` WHERE email = '$email'";
        $check_result = $conn->query($check_query);

        if ($check_result && $check_result->num_rows > 0) {
            // Email is already registered for saving
            echo "This email is already registered for saving.<br><a href='savingmpesa.php'><button>Proceed to save</button></a>";
        } else {
            // Register the email for saving
            $sql = "INSERT INTO `save` (email, pasword) VALUES ('$email', '$pasword')";

            if ($conn->query($sql) === TRUE) {
                echo "Thank you for registering to save with us!<br><a href='traders.html'><button>Save now</button></a>";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        }
    } else {
        // Email is not registered
        echo "You are not a registered member. Please register.<br><a href='register.html'><button>Register</button></a>";
    }

    // Close connection
    $conn->close();
?>
</body>

</html>