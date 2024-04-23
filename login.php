<!DOCTYPE html>
<html>

<head>
    <title>members login</title>
    <link rel="icon" type="image/x-icon" href="trader.png">
</head>

<body>
    <?php
       $host = "localhost";
       $username = "root";
       $password = "";
       $database = "test";
    
       if (isset($_POST['email']) && isset($_POST['pasword'])){
        function validation($data){
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
        $pasword = validation($_POST['pasword']);

        // Check user credentials using prepared statement
        $sql = "SELECT * FROM registration WHERE email = ? AND pasword = ?";
        $stmt = $connection->prepare($sql);

        // Bind parameters
        $stmt->bind_param("ss", $email, $pasword);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows == 1) {
            header("location:traders.html");
        } else {
            echo("Wrong password or email<br><a href='tik home.php'>Try again</a>");
        }

        $stmt->close();
        $connection->close();
    }
?>
</body>

</html>