<!DOCTYPE html>
<html>

<head>
    <title>Connect to Database</title>
</head>

<body>
    <?php
    $phone = filter_input(INPUT_POST, 'phone', FILTER_SANITIZE_NUMBER_INT);
    $amount = filter_input(INPUT_POST, 'amount', FILTER_SANITIZE_NUMBER_INT);

    $host = "localhost";
    $dbusername = "root";
    $dbpassword = "";
    $dbname = "test";

    // Create connection
    $conn = new mysqli($host, $dbusername, $dbpassword, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } else {
        // Prepare and bind parameters to avoid SQL injection
        $stmt = $conn->prepare("INSERT INTO withdraw_admin (phone, amount) VALUES (?, ?)");
        $stmt->bind_param("ii", $phone, $amount); // 's' for string, 'i' for integer

        if ($stmt->execute()) {
            echo "Thank you for saving with us....withdrawal is being processed.<br><a href='savings.html'><button>OKAY</button>";
        } else {
            header("location:success.php");
        }

        $stmt->close();
        $conn->close();
    }
    ?>
</body>

</html>