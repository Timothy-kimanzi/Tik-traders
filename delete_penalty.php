<?php
// Database connection parameters
$host = "localhost";
$username = "root";
$password = "";
$database = "test";

// Connect to the database
$conn = new mysqli($host, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if ID parameter is set in the URL
if(isset($_GET['id'])) {
    // Sanitize the ID parameter to prevent SQL injection
    $id = $_GET['id'];

    // Query to fetch the penalty based on the provided ID
    $sql = "SELECT * FROM penalty WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();

    // If penalty found for the given ID
    if ($result->num_rows > 0) {
        // Fetch the penalty row
        $row = $result->fetch_assoc();

        // Check if the penalty is zero
        if ($row['penalty'] == 0) {
            // Penalty is zero, proceed with deletion
            $delete_sql = "DELETE FROM penalty WHERE id = ?";
            $delete_stmt = $conn->prepare($delete_sql);
            $delete_stmt->bind_param("i", $id);
            $delete_stmt->execute();
            
            // Check if deletion was successful
            if ($delete_stmt->affected_rows > 0) {
                echo "Penalty deleted successfully.<br><button><a href='deleteloan.php'>Go back</a></button>";
            } else {
                echo "Failed to delete penalty.";
            }
            // Close delete statement
            $delete_stmt->close();
        } else {
            // Penalty is not zero, cannot be deleted
            echo "The user has not settled the debt. Penalty cannot be deleted.";
        }
    } else {
        // Penalty not found for the given ID
        echo "Penalty not found.";
    }
    // Close statement
    $stmt->close();
}

// Close database connection
$conn->close();
?>