<!DOCTYPE html>
<html>

<head>
    <title>calculator</title>
    <link rel="stylesheet" href="withdraw.css">
    <link rel="icon" type="image/x-icon" href="trader.png">
</head>
<style>
body {
    font-family: Arial, sans-serif;
}

form {
    max-width: 400px;
    margin: 0 auto;
}

input[type="number"] {
    width: 100%;
    padding: 10px;
    margin-bottom: 10px;
}

input[type="submit"] {
    width: 100%;
    padding: 10px;
    background-color: #4CAF50;
    color: white;
    border: none;
    cursor: pointer;
}

#result {
    margin-top: 20px;
    font-weight: bold;
}
</style>

<body style="text-align: center; background-color:gray;">
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
    <h3>Caculate the amount you repay from the loan you get.</h3>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <label for="amount">Amount:</label>
        <input type="number" id="amount" name="amount" required><br>
        <label for="duration">Duration (in months):</label>
        <input type="number" id="duration" name="duration" required><br>
        <input type="submit" name="submit" value="Calculate">
    </form>
    <div id="result">
        <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
      $amount = $_POST['amount'];
      $duration = $_POST['duration'];

      // Define interest rates based on duration
      $interestRate = 0;
      if ($duration >= 1 && $duration <= 3) {
        $interestRate = 0.035;
      } else if ($duration >= 4 && $duration <= 6) {
        $interestRate = 0.04;
      } else if ($duration >= 7 && $duration <= 12) {
        $interestRate = 0.048;
      } 
      else if ($duration >= 13 && $duration <= 24) {
        $interestRate = 0.06;
      }
      else if ($duration >= 25 && $duration <= 48) {
        $interestRate = 0.09;
      }
      else if ($duration >= 49 && $duration <= 96) {
        $interestRate = 0.12;
      }
      else {
        $interestRate = 0.15;
      }

      // Calculate total amount
      $totalAmount = $amount * (1 + $interestRate);

      // Display result
      echo "Total amount after " . $duration . " months: sh " . number_format($totalAmount, 2);
      echo "<br><a href=request.html>Request loan</a>";
    }
    ?>
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
                    <il>
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