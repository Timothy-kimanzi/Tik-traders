<!DOCTYPE html>
<html>

<head>
    <title>Contribution Confirmation</title>
    <link rel="icon" type="image/x-icon" href="trader.png">
    <style>
    h4 {
        color: blue;
    }
    </style>
</head>

<body>
    <?php
    // Retrieve user input from session
    session_start();
    $amount = $_SESSION['amount'];
    echo "<h4>THANK YOU...You have contributed : $amount.sh </h4><br>";
    echo "<h3>Make sure this amount is 1000 and above so that this season's contribution can be settled. <br>If not, contribute from below.<h2>";
    echo "<h3><a href='contribute.html'>Go to contribution</a></h3>";
    ?>
</body>

</html>