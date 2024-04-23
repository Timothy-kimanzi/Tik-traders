<!DOCTYPE html>
<html>

<head>
    <title>update</title>
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
        $product_name = $_POST['product_name'];
        $business_name = $_POST['business_name'];
        $price = $_POST['price'];
        $category = $_POST['category'];
        $phone_number = $_POST['phone_number'];
        $product_picture = $_POST['product_picture'];
        
        // Check if the phone number exists in the database
        $check_query = "SELECT * FROM advertise WHERE phone_number = ?";
        $stmt_check = $conn->prepare($check_query);
        $stmt_check->bind_param("s", $phone_number);
        $stmt_check->execute();
        $result_check = $stmt_check->get_result();
        
        if ($result_check->num_rows > 0) {
            // Phone number exists, proceed with the update
            $sql = "UPDATE advertise SET product_name = ?, business_name = ?, price = ?, category = ?, product_picture = ? WHERE phone_number = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("sssiss", $product_name, $business_name, $price, $category, $product_picture, $phone_number);
            
            if ($stmt->execute()) {
                echo "Record updated successfully<br><a href='traders.html'><button>OKAY</button></a>";
            } else {
                echo "Error updating record <br><a href='update.html'><button>Try again</button></a>"; 
            }
            
            $stmt->close();
        } else {
            // Phone number does not exist, inform the user to go back to the update form
            echo "Phone number not found.....<br><a href='update.html'>try again</a> .";
        }
        
        $stmt_check->close();
    }
    $conn->close();
}
?>


</body>

</html>