<!DOCTYPE html>
<html>

<head>
    <title>admin register</title>
    <link rel="icon" type="image/x-icon" href="trader.png">
</head>

<body>
    <?php
        $NAME = filter_input(INPUT_POST, 'NAME');
        $EMAIL = filter_input(INPUT_POST, 'EMAIL');
        $P_NUMBER = filter_input(INPUT_POST,'P_NUMBER');
        $WNAME = filter_input(INPUT_POST, 'WNAME');
        $ID = filter_input(INPUT_POST, 'ID');
        $POSITION = filter_input(INPUT_POST, 'POSITION');
        $pasword = filter_input(INPUT_POST, 'pasword');

        $host = "localhost";
        $dbusername = "root";
        $dbpassword = "";
        $dbname = "test";

        // Create connection
        $conn = new mysqli($host, $dbusername, $dbpassword, $dbname);

        // Check connection
        if (mysqli_connect_error()) {
            die('Connect Error ('.mysqli_connect_errno().') '.mysqli_connect_error());
        } else {
            // Check if the email already exists in the database
            $check_query = "SELECT * FROM officials WHERE EMAIL = '$EMAIL'";
            $check_result = $conn->query($check_query);
            if ($check_result->num_rows > 0) {
                // Redirect to login page or display a message indicating that the email is already registered
                echo "This email is already registered.<br><a href='Registration admin.php'><button>Please login</button></a>";
            } else {
                // Proceed with registration
                $sql = "INSERT INTO officials (NAME, EMAIL, P_NUMBER, WNAME, ID, POSITION, pasword) 
                        VALUES ('$NAME', '$EMAIL', '$P_NUMBER', '$WNAME', '$ID', '$POSITION', '$pasword')";

                if ($conn->query($sql)) {
                    echo "Registration is completed successfully<br> <a href='Registration admin.php'><button>Okay</button></a>";
                } else {
                    echo "Error<br><a href='official registration.html'><button>Try again</button></a>";
                }
            }
            $conn->close();
        }
    ?>
</body>

</html>