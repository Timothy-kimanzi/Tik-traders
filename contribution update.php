<?php
$host = "localhost";
$username = "root";
$password = "";
$database = "test";

if (isset($_POST['email']) && isset($_POST['phone_number'])) {
    function validation($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    // Database connection
    $connection = new mysqli($host, $username, $password, $database);

    if ($connection->connect_error) {
        die("Connection failed: " . $connection->connect_error);
    }

    // Retrieve user input
    $email = validation($_POST['email']);
    $phone_number = validation($_POST['phone_number']);

    // Check user credentials
    $sql = "SELECT amount FROM marry_go_round WHERE email = ? AND phone_number = ?";
    $stmt = $connection->prepare($sql);
    $stmt->bind_param("si", $email, $phone_number);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        $row_total = $result->fetch_assoc();

        // Start session and store amount
        session_start();
        $_SESSION['amount'] = $row_total['amount'];

        // User is authenticated; redirect to the home page
        header("Location: contributionview.php");
        exit();
    } else {
        // Authentication failed; display an error message or redirect back to the login page
        header("Location: notcontributed.php");
        exit();
    }

    $stmt->close();
    $connection->close();
}
?>