<!doctype html>
<html>

<head>
    <title>balance</title>
    <link rel="icon" type="image/x-icon" href="trader.png">
    <style>
    p {
        color: blue;
        font-size: larger;
    }
    </style>
</head>

<body>
    <?php
    // Retrieve user input from session
    session_start();
    $amount = $_SESSION['amount'];
    echo "<p>Your loan balance is: $amount<br></p> Please purpose to pay....THANK YOU<br>";
    ?>
    <a href="loans.html">Okay</a>
</body>

</html>