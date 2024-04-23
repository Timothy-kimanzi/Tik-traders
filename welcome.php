<!doctype html>
<html>

<head>
    <title>Welcome</title>
    <link rel="icon" type="image/x-icon" href="trader.png">
</head>

<body>
    <?php
    // Retrieve user input from session
    session_start();
    $amount = $_SESSION['amount'];
    echo "WELCOME! Thank you for saving with us! The total amount saved is: $amount";
    ?>
</body>

</html>