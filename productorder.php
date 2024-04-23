<!DOCTYPE html>
<html>

<head>
    <title>place order</title>
    <link rel="stylesheet" href="withdraw.css">
    <link rel="icon" type="image/x-icon" href="trader.png">
</head>

<body style="text-align: center;">

    <h id="h1" style="font-weight: bold;color: blue; font-size: 30px;">Request the product you want to buy here</h>
    <p>
    <p style="color: deeppink;">Dear member, make sure you fill the correct information about the product and you
        personal infomation!.....thank you</p>
    <h2>Order Details</h2>
    <form action="process_order.php" method="POST">
        <label for="product_name">Product Name:</label><br>
        <input type="text" name="product_name" style="width: 500px;background-color: cornsilk;color: blue;"
            value="<?php echo htmlspecialchars($_GET['product_name']); ?>"><br>

        <label for="business_name">Business Name:</label><br>
        <input type="text" name="business_name" style="width: 500px;background-color: cornsilk;color: blue;"
            value="<?php echo htmlspecialchars($_GET['business_name']); ?>"><br>

        <label for="price">Price:</label><br>
        <input type="text" name="price" style="width: 500px;background-color: cornsilk;color: blue;"
            value="<?php echo htmlspecialchars($_GET['price']); ?>"><br>

        <label for="category">Category:</label><br>
        <input type="text" name="category" style="width: 500px;background-color: cornsilk;color: blue;"
            value="<?php echo htmlspecialchars($_GET['category']); ?>"><br>

        <label for="phone_number">salers Phone Number:</label><br>
        <input type="number" name="phone_number" style="width: 500px;background-color: cornsilk;color: blue;"
            value="<?php echo htmlspecialchars($_GET['phone_number']); ?>"><br>
        <label for="phone_number"> customers Phone Number:</label><br>
        <input type="number" name="customer_number" style="width: 500px;background-color: cornsilk;color: blue;"
            required><br>
        <label for="quntity"> quntity:</label><br>
        <input type="number" name="quntity" style="width: 500px;background-color: cornsilk;color: blue;"
            required;><br><br>

        <input type="submit" value="Place Order">
        <button><a href="productview.php">Go back</a></button>
    </form>
    </p>

</body>

</html>