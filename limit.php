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
    $sql = "SELECT * FROM loans WHERE email = ? AND `password` = ?";
    $stmt = $connection->prepare($sql);
    $stmt->bind_param("ss", $email, $password);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        // Retrieve saved amount from the saving table
        $saving_query = "SELECT amount FROM `save` WHERE email=?";
        $stmt_saving = $connection->prepare($saving_query);
        $stmt_saving->bind_param("s", $email);
        $stmt_saving->execute();
        $result_saving = $stmt_saving->get_result();

        if ($result_saving->num_rows == 1) {
            $row_saving = $result_saving->fetch_assoc();
            $saved_amount = $row_saving['amount'];

            // Calculate the maximum loan amount
            $sql_existing_loan = "SELECT amount AS total_loan FROM loans WHERE email=?";
            $stmt_existing_loan = $connection->prepare($sql_existing_loan);
            $stmt_existing_loan->bind_param("s", $email);
            $stmt_existing_loan->execute();
            $result_existing_loan = $stmt_existing_loan->get_result();

            $row_existing_loan = $result_existing_loan->fetch_assoc();
            $existing_loan = $row_existing_loan['total_loan'];

            $max_loan_amount = ($saved_amount * 2) - $existing_loan;

            // Start session and store maximum loan amount
            session_start();
            $_SESSION['max_loan_amount'] = $max_loan_amount;

            // Redirect to welcome page
            header("Location: limit_check.php");
            exit();
        }
    } else {
        // Authentication failed; display an error message or redirect back to the login page
        echo "Invalid username or password. Please try again.<br><button><a href='limits.html'>Try again</a></button>";
        exit();
    }

    $stmt->close();
    $stmt_saving->close();
    $stmt_existing_loan->close();
    $connection->close(); // moved to the end
}
?>