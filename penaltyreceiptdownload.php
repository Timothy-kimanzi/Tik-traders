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

// Include TCPDF library
require_once('tcpdf/tcpdf.php');

// Function to generate PDF receipt for a specific row
function generatePDF($id, $conn) {
    // Query to retrieve data for the specific row
    $sql = "SELECT * FROM penalty_confirmation WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows > 0) {
        // Fetch the row data
        $row = $result->fetch_assoc();

        // Create new PDF instance
        $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

        // Set document information
        $pdf->SetCreator(PDF_CREATOR);
        $pdf->SetTitle('Receipt');
        $pdf->SetHeaderData('', 0, '', '');

        // Add a page
        $pdf->AddPage();

        // Add content to the PDF
        $content = '<h1 style="background-color: #c3e6cb; color: black; padding: 8px;"><img src="trade.png"> Tik Traders penalty Receipt</h1>';
        $content .= '<table style="border-collapse: collapse; width: 100%;">';
        $content .= '<tr><td style="border: 1px solid black; padding: 8px;">Email:</td><td style="border: 1px solid black; padding: 8px;">' . $row["email"] . '</td></tr>';
        $content .= '<tr><td style="border: 1px solid black; padding: 8px;">Transaction code:</td><td style="border: 1px solid black; padding: 8px;">' . $row["business_number"] . '</td></tr>';
        $content .= '<tr><td style="border: 1px solid black; padding: 8px;">Amount:</td><td style="border: 1px solid black; padding: 8px;">' . $row["amount"] . '</td></tr>';
        $content .= '</table>';

        $pdf->writeHTML($content, true, false, true, false, '');

        // Output the PDF as a download
        $pdf->Output('receipt.pdf', 'D');
    }
    $stmt->close();
}

// Handle download receipt action
if(isset($_GET['action']) && $_GET['action'] == 'download_receipt') {
    if(isset($_GET['id'])) {
        generatePDF($_GET['id'], $conn);
    }
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve email and password from the form
    $email = $_POST['email'];
    $password = $_POST['password'];

// Query to retrieve data from the database  
$sql = "SELECT * FROM penalty_confirmation WHERE email='$email'";
$result = $conn->query($sql);
}else{
    echo"You have not any payment!";
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Payment</title>
    <link rel="stylesheet" href="withdraw.css">
    <link rel="icon" type="image/x-icon" href="trader.png">
    <style>
    table {
        border-collapse: collapse;
        width: fit-content;
    }

    .table-container {
        padding-left: 35%;
    }


    th,
    td {
        border: 1px solid black;
        padding: 8px;
        text-align: center;
    }

    th {
        background-color: #c3e6cb;
        /* Greenish background */
        color: black;
        /* Black text */
    }
    </style>
</head>

<body style="text-align: center;background-color:gray;">
    <p style="text-align: right;">
        <button class="customers"><a href="traders.html" style=" text-decoration: none; text-align: left; color:
                white;">HOME</a></button>
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

    <div class="table-container">
        <h2>My Payments</h2>
        <table>
            <tr>
                <th>Email</th>
                <th>Transaction number</th>
                <th>Amount</th>
                <th>Action</th> <!-- New column for action -->
            </tr>

            <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["email"] . "</td>";
                echo "<td>" . $row["business_number"] . "</td>";
                echo "<td>" . $row["amount"] . "</td>";
                echo "<td><a class='receipt-link' href='?action=download_receipt&id=".$row['id']."'>Download Receipt</a></td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='5'>No data found</td></tr>";
        }
        ?>
        </table>
        <br>
        <button><a href="traders.html">Go Back</a></button>
    </div>
    <p id="p2">
    <div id="d2" class="centered">
        <div class="left">
            <h style="font-weight: bold;">SERVICES</h>
            <form>
                <ul>
                    <il><a href="loans.html" style="text-decoration: none;"> loans</a></il></br>
                    <il> <a href="savings.html" style="text-decoration: none;"> savings</a></il></br>
                    <il><a href="advertisement.html" style="text-decoration: none;">advertisement</a></il></br>
                    <il> <a href="traders.html#p1" style="text-decoration: none;">communication</a></il></br>
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
                    <il> <a href="location.html" style="text-decoration: none;"> Location</a></il></br>
                    <il><a href="aims.html" style="text-decoration: none;">Goals</a></il></br>
                    <il> <a href="activities.html" style="text-decoration: none;">Administration</a></il></br>
                </ul>
            </form>
        </div>
    </div>
    <div id="d3" class="right">
        <div class="centered">
            <h style="font-weight: bold;">CUSTOMERCARE</h>
            <form>
                <ul>
                    <il><a href="callto:" style="text-decoration: none;text-align: left;font-size:160%;"> <img
                                src="call.png" class="call-icon" id="callIcon" alt="calls"
                                style="height: 40px; width: 40px;">
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
                        </a></il><br>
                    <il> <a href="" style="text-align: left;font-size:160%;" class="whatsapp-icon" id="whatsappIcon">
                            <img src="whatsapp.png" alt="whatsapp" style="height: 40px; width: 40px;">
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
                        </a></il><br>
                    <il> <a href="mailto:timothykimanzi47@gmail.com"
                            style="text-decoration: none;text-align: left;font-size:160%;"> <img src="email.jpg"
                                alt="email" style="height: 40px; width: 40px;"></a>
                    </il>
                </ul>
            </form>
        </div>
    </div>
    </p>
</body>

</html>