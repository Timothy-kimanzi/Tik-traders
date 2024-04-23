<?php
$host = "localhost";
$username = "root";
$password = "";
$database = "test";

if (isset($_POST['email']) && isset($_POST['password'])) {
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
    $password = validation($_POST['password']); // changed variable name

    // Check user credentials
    $sql = "SELECT * FROM penalties WHERE email = ? AND `password` = ?";
    $stmt = $connection->prepare($sql);
    $stmt->bind_param("ss", $email, $password);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        // User is authenticated; redirect to the home page
        $sql_total = "SELECT amount FROM penalties WHERE email = ? AND `password` = ?";
        $stmt_total = $connection->prepare($sql_total);
        $stmt_total->bind_param("ss", $email, $password); // changed the order of parameters
        $stmt_total->execute();
        $result_total = $stmt_total->get_result();
        $row_total = $result_total->fetch_assoc();

        // Start session and store amount
        session_start();
        $_SESSION['amount'] = $row_total['amount'];

        // Redirect to welcome page
        header("Location: penalties.php");
        exit();
    } else {
        // Authentication failed; display an error message or redirect back to the login page
        echo "Invalid username or password. Please try again.";
        header("Location: pelnalties.html.html");
        exit();
    }

    $stmt->close();
    $stmt_total->close();
    $connection->close(); // moved to the end
}
?>