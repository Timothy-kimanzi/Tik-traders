<!DOCTYPE html>
<html>

<head>
    <title>depositing</title>
    <link rel="icon" type="image/x-icon" href="trader.png">
</head>

<body>
    <?php
$email = filter_input(INPUT_POST, 'email');
$phone = filter_input(INPUT_POST, 'phone');
$amount = filter_input(INPUT_POST, 'amount');
$transaction = filter_input(INPUT_POST, 'transaction');
$pasword = filter_input(INPUT_POST, 'pasword');
$host = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "test";

// Create connection
$conn = new mysqli($host, $dbusername, $dbpassword, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if email exists in the database
$email_check_query = "SELECT * FROM save WHERE email='$email' AND pasword='$pasword'";
$result = $conn->query($email_check_query);
if ($result->num_rows == 0) {
    header("location:savingerror.php");
} else {
    $new_amount = $amount;
    // Check if there is another amount saved
    $row = $result->fetch_assoc();
    $existing_amount = $row['amount'];
    if ($existing_amount !== null) {
        // Add the new amount to the existing amount
        if ($new_amount !== null) {
            $new_amount += $existing_amount;
        } else {
            $new_amount = $existing_amount;
        }
    }

    // Update query
    $sql = "UPDATE `save` SET phone='$phone', amount='$new_amount', transaction='$transaction', pasword='$pasword', status ='pedding' WHERE email='$email'";
    if ($conn->query($sql) === TRUE) {
        $sql2="INSERT INTO save_payment(email, phone, `transaction`, amount) VALUES('$email', '$phone', '$transaction','$amount')";
        if ($conn->query($sql2) === TRUE){

       
        echo "Saving is done successfully<br> <a href='traders.html'>OKEY</a>" ;
        }
        else{
            echo"an error in payments";
        }
    } else {
        echo "Error updating record:<br><button><a href='saving.html'>try again</a></button> " . $conn->error;
    }
}

$conn->close();
?>
</body>

</html>