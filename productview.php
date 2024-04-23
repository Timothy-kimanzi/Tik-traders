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

// Query to retrieve data from the database
$sql = "SELECT * FROM advertise";
$result = $conn->query($sql);

?>
<!DOCTYPE html>
<html>

<head>
    <title>orders</title>
    <link rel="stylesheet" href="withdraw.css">
    <title>View products advertised</title>
    <link rel="icon" type="image/x-icon" href="trader.png">
    <style>
    #k {
        width: auto;
        max-width: fit-content;
        height: fit-content;
        height: auto;
        margin: 20px auto;
        padding: 10px;
        background-color: white;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        text-align: center;
        color: blue;
    }

    table {
        margin: 0 auto;
        font-size: 16px;
        border-collapse: collapse;
    }

    table th,
    table td {
        padding: 10px;
        /* Adjust the padding around each cell */
        border: 1px solid #ddd;
    }

    table th {
        font-weight: bold;
        background-color: #f2f2f2;
    }

    table img {
        max-width: 70px;
        max-height: 70px;
    }
    </style>
</head>

<body style="width: auto; background-color:white;">
    <h2 style="text-align: center;">Place your order here to get the products</h2>
    <div id="k">
        <h2>Products Available</h2>
        <table>
            <tr>
                <th>Product Name</th>
                <th>Business Name</th>
                <th>Price</th>
                <th>Category</th>
                <th>Phone Number</th>
                <th>Product Picture</th>
                <th>Action</th>
            </tr>
            <?php
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row["product_name"] . "</td>";
                    echo "<td>" . $row["business_name"] . "</td>";
                    echo "<td>" . $row["price"] . "</td>";
                    echo "<td>" . $row["category"] . "</td>";
                    echo "<td>" . $row["phone_number"] . "</td>";
                    // Displaying the image data using base64 encoding
                    echo "<td><img src='" . $row['product_picture'] . "' alt='Product Picture'></td>";
                    // Action link to copy details and redirect to order page
                    echo "<td><a href='productorder.php?";
                    echo "product_name=" . urlencode($row["product_name"]) . "&";
                    echo "business_name=" . urlencode($row["business_name"]) . "&";
                    echo "price=" . urlencode($row["price"]) . "&";
                    echo "category=" . urlencode($row["category"]) . "&";
                    echo "phone_number=" . urlencode($row["phone_number"]) . "'>";
                    echo "Order Now</a></td>";
                    
                }
            } else {
                echo "<tr><td colspan='7'>No data found</td></tr>";
            }
            $conn->close();
            ?>
        </table><br>
        <button><a href="tik home.php">Go back</a></button>
    </div>


    </p>
</body>

</html>