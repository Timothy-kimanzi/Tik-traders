<!doctype html>
<html>

<head>
    <title>limits</title>
    <link rel="icon" type="image/x-icon" href="trader.png">
    <style>
    p {
        color: blue;
    }

    p1 {
        font-size: bond;
    }
    </style>
</head>

<body>
    <?php
    // Retrieve user input from session
    session_start();
    // Retrieve the maximum loan amount from the session
    $max_loan_amount = $_SESSION['max_loan_amount'];
    echo "<p>Your total limit : $max_loan_amount</p> <br> You can request for this amount<br> THANK YOU!<br>";
        ?>
    <p1><button><strong><a href="limits.html">OKEY</a></strong></button></p1>
</body>

</html>