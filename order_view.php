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
$sql = "SELECT * FROM orders";
$result = $conn->query($sql);
// Update the status to 'worked on' when the action is performed
if(isset($_GET['action']) && $_GET['action'] == 'work') {
    $updateSql = "UPDATE orders SET status = 'worked on' WHERE id = ?";
    $stmt = $conn->prepare($updateSql);
    $stmt->bind_param("i", $id);
    $id = $_GET['id'];
    $stmt->execute();
    $stmt->close();
    // Redirect back to the same page after performing the action
    header("Location: ".$_SERVER['PHP_SELF']);
    exit;
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>orders</title>
    <link rel="stylesheet" href="withdraw.css">
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

<body style="text-align: center;background-color:gray">
    <p style="text-align: right;">
        <button class="customers"><a href="traders.html"
                style="text-decoration: none; text-align: left; color: white;">HOME</a></button>
        <div1 class="dropdown">
            <button class="customers">CUSTOMERCARE</button>
            <div1 class="dropdown-men1" style="margin-left: 77%; min-width: 160px;">
                <a href="callto:" style="text-decoration: none;text-align: left;font-size:160%;"> <img src="call.png"
                        class="call-icon" id="callIcon" alt="calls" style="height: 40px; width: 40px;">
                    <script>
                    // Get the call icon element
                    var callIcon = document.getElementById('callIcon');

                    // Add click event listener to the call icon
                    callIcon.addEventListener('click', function() {
                        // Change the phone number to your desired phone number
                        var phoneNumber = '+254716140575';

                        // Initiate the phone call
                        window.location.href = 'tel:' + phoneNumber;
                    });
                    </script>
                </a>
                <a href="" style="text-align: left;font-size:160%;" class="whatsapp-icon" id="whatsappIcon"> <img
                        src="whatsapp.png" alt="whatsapp" style="height: 40px; width: 40px;">
                    <script>
                    // Get the WhatsApp icon element
                    var whatsappIcon = document.getElementById('whatsappIcon');

                    // Add click event listener to the WhatsApp icon
                    whatsappIcon.addEventListener('click', function() {
                        // Change the phone number to your desired WhatsApp number
                        var phoneNumber = '+254716140575'; // Your WhatsApp number

                        // Generate the WhatsApp message link
                        var whatsappLink = 'https://wa.me/' + phoneNumber;

                        // Open the WhatsApp link in a new tab/window
                        window.open(whatsappLink, '_blank');
                    });
                    </script>
                </a>

                <a href="mailto:timothykimanzi47@gmail.com"
                    style="text-decoration: none;text-align: left;font-size:160%;"> <img src="email.jpg" alt="email"
                        style="height: 40px; width: 40px;"></a>
            </div1>
        </div1>
        <div1 class="dropdown1">
            <button class="customers">ABOUTUS</button>
            <div2 class="dropdown-men2" style="margin-left: 84%; min-width: 160px;">

                <a href="history.html" style="text-decoration: none;text-align: center; font-size:160%;">
                    History</a>
                <a href="location.html" style="text-decoration: none;text-align: center;font-size:160%;">Location</a>
                <a href="aims.html" style="text-decoration: none;text-align: center;font-size:160%;">Goals</a>
                <a href="activities.html"
                    style="text-decoration: none;text-align: center;font-size:160%;">Administration</a>

            </div2>
        </div1>
        <div1 class="dropdown2">
            <button class="customers">SERVICES</button>
            <div3 class="dropdown-men3" style="margin-left: 87%; min-width: 160px;">

                <a href="loans.html" style="text-decoration: none;text-align: center;font-size:160%;"> loans</a>
                <a href="savings.html" style="text-decoration: none;text-align: center;font-size:160%;"> savings</a>
                <a href="advertisement.html"
                    style="text-decoration: none;text-align: center;font-size:160%;">advertisement</a>
                <a href="traders.html#p1"
                    style="text-decoration: none;text-align: center;font-size:160%;">communication</a>
                <a href="marry go round.html" style="text-decoration: none;text-align: center;font-size:160%;">
                    marrygoround</a>

            </div3>
        </div1>
    </p>
    <div id="k">
        <h2>pending orders</h2>
        <table>
            <tr>
                <th>ID</th>
                <th>product_name</th>
                <th>business_name</th>
                <th>price</th>
                <th>category</th>
                <th>phone_number</th>
                <th>customer_number</th>
                <th>quantity</th>
                <th>status</th>
                <th>Action</th> <!-- New column for action -->
            </tr>
            <?php
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row["id"] . "</td>";
                    echo "<td>" . $row["product_name"] . "</td>";
                    echo "<td>" . $row["business_name"] . "</td>";
                    echo "<td>" . $row["price"] . "</td>";
                    echo "<td>" . $row["category"] . "</td>";
                    echo "<td>" . $row["phone_number"] . "</td>";
                    echo "<td>" . $row["customer_number"] . "</td>";
                    echo "<td>" . $row["quntity"] . "</td>";
                    echo "<td>" . $row["status"] . "</td>";
                    echo "<td><a href='?action=work&id=".$row['id']."'>mark seen</a></td>";
        echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='7'>No data found</td></tr>";
            }
            $conn->close();
            ?>
        </table>
    </div>


    </p>
    <p id="p2">
    <div id="d2" class="centered">
        <div class="left">
            <h style="font-weight: bold;">SERVICES</h>
            <form>
                <ul>
                    <il><a href="loans.html" style="text-decoration: none;"> loans</a></il></br>
                    <il> <a href="savings.html" style="text-decoration: none;"> savings</a></il></br>
                    <il><a href="advertisement.html" style="text-decoration: none;">advertisement</a></il></br>
                    <il> <a href="traders.html#p1" style="text-decoration: none;">communication</a>
                    </il></br>
                    <il><a href="marry go round.html" style="text-decoration: none;"> marrygoround</a></il>
                </ul></br>
                </ul>
            </form>
        </div>
    </div>
    <div id="d2" class="">
        <div class="left">
            <h style="font-weight: bold;">ABOUT US</h>
            <form>
                <ul>
                    <il><a href="history.html" style="text-decoration: none;"> history</a></il></br>
                    <il> <a href="location.html" style="text-decoration: none;"> <img src="location.png"
                                alt="location"></a>
                    </il></br>
                    <il><a href="aims.html" style="text-decoration: none;">aims</a></il></br>
                    <il> <a href="activities.html" style="text-decoration: none;">activities</a></il></br>
                </ul>
            </form>
        </div>
    </div>
    <div id="d3" class="right">
        <div class="centered">
            <h style="font-weight: bold;">CUSTOMERCARE</h>
            <form>
                <ul>
                    <il><a href="call us on" style="text-decoration: none;"> <img src="call.png" alt="calls"
                                style="height: 40px; width: 40px;"> </a></il></br>
                    <il><a href="https://api.whatsapp.com/send?phone=+254798007218"> <img src="whatsapp.png"
                                alt="whatsapp" style="height: 40px; width: 40px;"></a></il></br>

                    <il> <a href="mailto:timothykimanzi47@gmail.com" style="text-decoration: none;"> <img
                                src="email.jpg" alt="email" style="height: 40px; width: 40px;"></a></il>
                </ul>
            </form>
        </div>
    </div>
    </p>
</body>

</html>