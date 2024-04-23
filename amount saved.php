<?php
$host = "localhost";
$username = "root";
$password = "";
$database = "test";

if (isset($_POST['email']) && isset($_POST['Phone']) && isset($_POST['pasword'])) {
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
    $phone = validation($_POST['Phone']); // changed variable name
    $password = validation($_POST['pasword']); // changed variable name

    // Check user credentials
    $sql = "SELECT * FROM save WHERE email = ? AND phone = ? AND pasword = ?";
    $stmt = $connection->prepare($sql);
    $stmt->bind_param("sss", $email, $phone, $password);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        // User is authenticated; redirect to the home page
        $sql_total = "SELECT amount FROM save WHERE email = ? AND pasword = ? AND phone = ?";
        $stmt_total = $connection->prepare($sql_total);
        $stmt_total->bind_param("sss", $email, $password, $phone); // changed the order of parameters
        $stmt_total->execute();
        $result_total = $stmt_total->get_result();
        $row_total = $result_total->fetch_assoc();

        // Start session and store amount
        session_start();
        $_SESSION['amount'] = $row_total['amount'];

        // Redirect to welcome page
        header("Location: welcome.php");
        exit();
    } else {
        // Authentication failed; display an error message or redirect back to the login page
        echo "Invalid username or password. Otherwise you have not made any saving.<br><a href='amountsaved.html'><button>try again</button></a>";
        echo"<br><a href='saving.html'>MAKE SAVINGS</a>";
        exit();
    }

    $stmt->close();
    $stmt_total->close();
    $connection->close(); // moved to the end
}
?>