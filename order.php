<!DOCTYPE html>
<html>

<head>
    <title>order</title>
    <link rel="stylesheet" href="withdraw.css">
    <link rel="icon" type="image/x-icon" href="trader.png">
    <style>
    input[type="text"],
    input[type="file"],
    input[type="number"],
    #cat,
    input[type="password"] {
        width: 500px;
        background-color: cornsilk;
        color: blue;
        border-radius: 10px;
        /* Added curved angles */
        padding: 5px;
        /* Added padding for better appearance */
        border: 1px solid #ccc;
        /* Added border for clarity */
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
    <h id="h1" style="font-weight: bold;color: blue; font-size: 30px;">Request the product you want to buy here</h>
    <p>
    <p style="color:black">Dear member, make sure you fill the correct information about the product and you
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
        <button><a href="view.php">Go back</a></button>
    </form>
    <script>
    document.getElementById("phone_number").addEventListener("input", function() {
        this.value = this.value.replace(/\D/g, '');
    });

    document.querySelector('form').addEventListener('submit', function(event) {
        const phoneNumber = document.getElementById('phone_number').value;

        if (!isValidPhoneNumber(phoneNumber)) {
            alert('Phone number must start with "07" or "01" and have 10 digits.');
            event.preventDefault();
        }
    });

    function isValidPhoneNumber(phoneNumber) {
        // Regular expression for Kenyan phone number validation
        const phoneRegex = /^(07|01)\d{8}$/;
        return phoneRegex.test(phoneNumber);
    }
    </script>
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
                    <il> <a href="location.html" style="text-decoration: none;"> <img src="location.png"
                                alt="location"></a></il></br>
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