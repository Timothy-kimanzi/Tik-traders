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
    $phone = $_POST["phone"];
    $withdraw = $_POST["withdraw"];
    $pasword = $_POST["pasword"];

    // Validate form data
    function validateData($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    // Validate form fields
    $email = validateData($email);
    $phone = validateData($phone);
    $withdraw = validateData($withdraw);
    $pasword = validateData($pasword);

    // Database connection
    $conn = new mysqli($host, $username, $password, $database);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Check if withdrawal amount is available
    $amount_query = "SELECT amount FROM `save` WHERE email = '$email' AND phone= '$phone' AND pasword = '$pasword' AND `status` = 'confirmed'";
    $amount_result = $conn->query($amount_query);

    if ($amount_result->num_rows > 0) {
        $row = $amount_result->fetch_assoc();
        $amount = $row["amount"];
        
        if ($amount >= $withdraw) {
            // Perform withdrawal
            $new_amount = $amount - $withdraw;
            $update_query = "UPDATE save SET amount = $new_amount WHERE email = '$email' AND phone= '$phone'";
            $conn->query($update_query);
            $stmt = $conn->prepare("INSERT INTO withdraw_admin (phone, withdraw) VALUES (?, ?)");
            $stmt->bind_param("ii", $phone, $withdraw); //  'i' for integer
    
            if ($stmt->execute()){
            echo "Thank you for saving with us....withdrawal is being processed.<br><a href='traders.html'><button>OKAY</button>";
                        exit();}
            else{
           echo"Record not made<a href='traders.html'><button>OKAY</button>";
            }
        } else {
            // Redirect with insufficient funds message
            header("Location: no_fund.php");
            exit();
        }
    } else {
        // Redirect with error message
        header("Location: withdraw error.php");
        exit();
    }
    $conn->close();
}
?>