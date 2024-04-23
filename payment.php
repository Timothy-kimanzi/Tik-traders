<!DOCTYPE html>
<html>

<head>
    <title>Loan Payment</title>
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
            $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
            $phone_number = filter_input(INPUT_POST, 'phone_number');
            $payment = filter_input(INPUT_POST, 'payment', FILTER_VALIDATE_FLOAT);
            $code = filter_input(INPUT_POST, 'code');
            $password = filter_input(INPUT_POST, 'password');
            
             $select_query = "SELECT * FROM loans WHERE email='$email' AND `password`='$password'";
                $result = $conn->query($select_query);

                if ($result && $result->num_rows > 0) {
                    $row = $result->fetch_assoc();
                    $loan_amount = $row['amount'];
                    
                    if ($loan_amount >= $payment) {
                        // Update the loan amount by subtracting payments
                        $update_sql = "UPDATE loans SET amount = amount - $payment WHERE email = '$email' AND `password` = '$password'";
                        
                        if ($conn->query($update_sql) === true) {
                            // Insert payment information into the payments table
                            $insert_sql = "INSERT INTO payments (email, phone_number, payment, code) VALUES ('$email', '$phone_number', '$payment', '$code')";
                            if($conn->query($insert_sql)) {
                                echo "Loan amount updated successfully<br>";
                                echo "Payment registration also completed successfully<br><a href='traders.html'>OKAY</a>";
                            } else {
                                echo "Error inserting payment:<br><a href='payments.html'><button>try again</button></a> " ;
                            }
                        } else {
                            echo "Error updating loan amount: <br><a href='payments.html'><button>try again</button></a>";
                        }
                    } else {
                        echo "Payment amount exceeds your remaining loan balance.<br><button><a href='payments.html'>Go back</a></button>";
                    }
                } else {
                    echo "Please you don't have any loan to be paid<br>Otherwise you have entered wrong details<br><button><a href='payments.html'>Try again</a></button>";
                }
            
        }
        $conn->close();
    }
    ?>
</body>

</html>