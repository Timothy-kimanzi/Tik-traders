<!DOCTYPE html>
<html>

<head>
    <title>Withdrawal Successful</title>
    <link rel="icon" type="image/x-icon" href="trader.png">
</head>

<body style="text-align: center;">
    <h1>Withdrawal Successful</h1>
    <h2>Confirm your details!</h2>
    <form action="withdrawadmin.php" method="post">
        <label for="phone">Enter your M-Pesa number</label><br>
        <input type="number" id="phone" name="phone" required
            style="width: 500px; background-color: cornsilk; color: blue;"><br>

        <label for="amount">Enter amount you want to withdraw</label><br>
        <input type="number" id="amount" name="amount" required
            style="width: 500px; background-color: cornsilk; color: blue;"><br>

        <input type="submit" value="Confirm" style="background-color: blue;">
    </form>
</body>

</html>