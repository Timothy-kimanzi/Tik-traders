<?php
$email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
$password = filter_input(INPUT_POST, 'password');

$host = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "test";

// Create connection
$conn = new mysqli($host, $dbusername, $dbpassword, $dbname);

// Check connection
if (mysqli_connect_error()) {
    die('Connect Error (' . mysqli_connect_errno() . ') ' . mysqli_connect_error());
} else {
    // Check if the email is registered
    $check_reg_query = "SELECT * FROM registration WHERE email='$email'";
    $check_reg_result = $conn->query($check_reg_query);

    if ($check_reg_result && $check_reg_result->num_rows > 0) {
        $check_query = "SELECT * FROM loans WHERE email = '$email'";
        $check_result = $conn->query($check_query);
        
        if ($check_result->num_rows > 0) {
            // Email is already registered for a loan
            echo "This email is already registered for a loan.<br><a href='request.html'><button>Please request</button></a>";
        } else {
            // Proceed with the loan application
            $sql = "INSERT INTO loans (email, `password`) VALUES ('$email', '$password')";
            if ($conn->query($sql)) {
                echo "Loan registration done successfully<br><a a href='request.html'><button>Request</button></a>";
            } else {
                echo "Loan registration not successful. Please try again.<br><a href='loan_register.html'><button>Register</button></a>";
            }
        }
    } else {
        // Email is not registered
        echo "You are not a registered member. Please register.<br><a href='register.html'><button>Register</button></a>";
    }

    $conn->close();
}
?>