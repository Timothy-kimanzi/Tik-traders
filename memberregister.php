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
            $NAME =filter_input(INPUT_POST, 'NAME');
            $EMAIL=filter_input(INPUT_POST, 'EMAIL');
            $P_NUMBER=filter_input(INPUT_POST,'P_NUMBER');
            $BNAME=filter_input(INPUT_POST, 'BNAME');
            $b_number =filter_input(INPUT_POST, 'b_number');
            $location =filter_input(INPUT_POST, 'location');
            $t_number=filter_input(INPUT_POST, 't_number');
            $pasword =filter_input(INPUT_POST, 'pasword');
            
          // Check if the email already exists in the database
    $check_query = "SELECT * FROM registration WHERE EMAIL = '$EMAIL'";
    $check_result = $conn->query($check_query);
    if ($check_result->num_rows > 0) {
        // Redirect to login page or display a message indicating that the email is already registered
        echo "This email is already registered.<br><a href='tik home.php'><button>Please login</button></a>";
    } else {
        // Proceed with registration
        $sql = "INSERT INTO registration (`NAME`, EMAIL, P_NUMBER, BNAME, b_number, `location`,t_number, pasword) 
                VALUES ('$NAME', '$EMAIL', '$P_NUMBER', '$BNAME', '$b_number', '$location', '$t_number','$pasword')";

        if ($conn->query($sql)) {
            echo "Registration is completed successfully<br> <a href='tik home.php'><button>Login</button></a>";
        } else {
            echo "Error<br><a href='register.html'><button>Try again</button></a>";
        }
    }
    $conn->close();
}}
?>