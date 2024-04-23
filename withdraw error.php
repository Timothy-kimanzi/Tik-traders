<!DOCTYPE html>
<html>

<head>
    <title>Withdrawal Successful</title>
    <link rel="icon" type="image/x-icon" href="trader.png">
    <style>
    p {
        color: blue;
    }
    </style>
</head>

<body>
    <?php
    echo " <p>You have entered wrong details....<br>please check your details and try again! </p><br> If sure with your details contact the customercare<br> 
    <a href='callto:' style='text-decoration: none;text-align: left;font-size:160%;'> <img
    src='call.png' class='call-icon' id='callIcon' alt='calls'
    style='height: 40px; width: 40px;'>
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
</a><br>"
    ?>
    <a href="withdraw.html">try again</a>
</body>

</html>