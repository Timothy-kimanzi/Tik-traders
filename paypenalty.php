<?php
// Database connection
$host = "localhost";
$username = "root";
$password = "";
$database = "test";

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $email = $_POST["email"];
    $business_number = $_POST["business_number"];
    $amount = $_POST["amount"];
    
    // Validate form data
    function validateData($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    // Validate form fields
    $email = validateData($email);
    $business_number = validateData($business_number);
    $amount = validateData($amount);

    // Database connection
    $conn = new mysqli($host, $username, $password, $database);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Check if withdrawal amount is available
    $amount_query = "SELECT penalty FROM penalty WHERE email = '$email' AND business_number = '$business_number'";
    $penalty_result = $conn->query($amount_query); // fixed variable name here

    if ($penalty_result->num_rows > 0) {
        $row = $penalty_result->fetch_assoc();
        $penalty = $row["penalty"];

        // Check if penalty is sufficient for payment
        if ($penalty >= $amount) {
            // Perform withdrawal
            $new_penalty = $penalty - $amount;
            $update_query = "UPDATE penalty SET penalty = $new_penalty WHERE email = '$email' AND business_number = '$business_number'";
            if ($conn->query($update_query) === TRUE) {
                
                // Insert payment confirmation details
                $sql = "INSERT INTO penalty_confirmation (email, business_number, amount) VALUES ('$email', '$business_number', '$amount')";
                if ($conn->query($sql) === TRUE) {
                    echo "Payment done successfully<br><button><a href='penaltyview.php'><Okay/a></button>";
                    exit();
                } else {
                    echo "Error: " . $sql . "<br>" . $conn->error;
                }
            } else {
                echo "Error updating penalty: <br><a href='paypenalties.php'>Try again</a>" . $conn->error;
            }
        } else {
            // Redirect with insufficient funds message
            echo"This penalty is already cleared.<br>Otherwise you are paying excess  amount.<br>pay only the required amount<br><button><a href=' penalties.html'>Okay</a></button>";
            exit();
        }
    } else {
        // Redirect with error message
        echo "Payment not successful";
        header("Location: paypenalties.php");
        exit();
    }

    $conn->close();
}
?>