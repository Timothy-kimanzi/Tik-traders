<!DOCTYPE html>
<html lang="en">

<head>
    <title>TIK SACCO</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="style.css">
    <link rel="icon" type="image/x-icon" href="trader.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <style>
    body {
        text-align: center;
    }

    .container {
        width: auto;
        height: 350px;
        background-color: blue;
        margin: 0 auto;
        padding: 5%;
    }

    h1,
    h2,
    p {
        color: white;
    }

    input[type="email"],
    input[type="password"] {
        background-color: cornsilk;
        color: blue;
        margin-bottom: 10px;
        padding: 5px;
        width: 100%;
        box-sizing: border-box;
    }

    input[type="submit"],
    input[type="reset"],
    .cnm {
        background-color: blueviolet;
        color: white;
        border: none;
        padding: 10px 20px;
        cursor: pointer;
        border-radius: 5px;
        margin-right: 10px;
    }

    a {
        text-decoration: none;
        color: white;
    }

    a:hover {
        text-decoration: underline;
    }

    .hover-div {
        background-color: #666666;
        transition: background-color 1s ease;
    }

    .hover-div:hover {
        background-color: #1A1110;
    }

    .hover-image {
        transition: transform 0.5s ease;
    }

    .hover-image:hover {
        transform: scale(1.2);

    }
    </style>
</head>

<body>
    <div class="container-fluid, main" style="height:auto;width:auto;">
        <div class="navbar">
            <div class="icon">
                <h2 class="logo"><img src="trader.png" style="height: 3cm; width: 3cm;"></h2>
            </div>

            <div class="menu">
                <ul>
                    <li><a href="#">HOME</a></li>
                    <li><a href="#about us">ABOUT</a></li>
                    <li><a href="#membership">MEMBERSHIP</a></li>
                    <li><a href="#SERVICES">SERVICE</a></li>
                    <li><a href="#communication">MEDIAS</a></li>
                    <li><a href="#contacts">CONTACT</a></li>
                    <li><a href="#partners">PARTNERS</a></li>
                </ul>
            </div>
            <div class="search">
            </div>

        </div>
        <div class="content">
            <h1 style="font-size:larger; color:greenyellow; text-align:left">TIK TRADERS SACCO</h1>
            <p id="greeting" style="text-align: center;font-style: italic;font-weight: bold;">
                <script>
                function displayGreeting() {
                    var now = new Date();
                    var hour = now.getHours();

                    var greeting;

                    if (hour >= 6 && hour < 12) {
                        greeting = "Good morning!";
                    } else if (hour >= 12 && hour < 18) {
                        greeting = "Good afternoon!";
                    } else {
                        greeting = "Good evening!";
                    }

                    var greetingElement = document.getElementById("greeting");
                    greetingElement.innerText = greeting;
                    greetingElement.style.fontSize = "150%";
                    greetingElement.style.color = "white";

                    setTimeout(function() {
                        greetingElement.innerText = " WELCOME TO TIK TRADERS SACCO WEBSITE";
                        greetingElement.style.color = "black";
                        greetingElement.style.fontSize = "150%";
                    }, 3000);


                    // Repeat the process every 27 seconds
                    setTimeout(displayGreeting, 6000);
                }

                displayGreeting(); // Display greeting when the page loads
                </script>
            </p><br><br>
        </div>
        <div class="content">
            <div class="par">
                <div class="image-container">
                    <div class="text-overlay">
                        <p id="image-text">Text Over Image</p>
                    </div>
                    <img id="dynamic-image" src="image1.jpg" alt="Dynamic Image">
                </div>
                <script>
                const images = [
                    'loan.jpg',
                    'saving.jpg',
                    'marry go round.jpg',
                    'advertisement.png',
                    // Add more image URLs as needed
                ];

                // List of image texts
                const imageTexts = [
                    'WE GIVE LOANS TO OUR MEMBERS',
                    'WE ALLOW OUR THEM TO SAVE WITH US',
                    'WE ALSO ALLOW OUR MEMBERS TO PRACTICE TEAM WORK BY ORGANIZING MARRY GO ROUNDS FOR THEM',
                    'MEMBERS CAN ADVERTISE THERE GOODS AND SERVICES AND TRADE WITHING OUR WEBSITE',
                    // Add more texts as needed
                ];

                // Get the image and text elements
                const imageElement = document.getElementById('dynamic-image');
                const textElement = document.getElementById('image-text');

                let currentIndex = 0;

                // Function to change the image and text
                function changeImageAndText() {
                    const imageUrl = images[currentIndex];
                    const text = imageTexts[currentIndex];
                    imageElement.src = imageUrl;
                    textElement.textContent = text;
                    currentIndex = (currentIndex + 1) % images.length;
                }

                // Change the image and text every 3 seconds (adjust as needed)
                setInterval(changeImageAndText, 6000);

                // Initialize the first image and text
                changeImageAndText();
                </script><br>
                <div style="text-align: left; color:black"> WANT TO BE A MEMBER?
                    <button class="cn"><a href="register.html">REGISTER HERE</a></button>
                </div>
                <div style="text-align: center; color:black">BUY PRODUCTS HERE<br>
                    <button class="cn"><a href="productview.php">VIEW PRODUCTS </a></button>
                </div>
            </div>



            <div class="form" id="login" style="width: auto;height:auto">
                <form action="login.php" method="post" style="text-align:left">
                    <h3 style="text-align:left">Members login</h3><br>
                    <label for="email">ENTER YOUR EMAIL </label><br>
                    <input type="email" id="email" name="email" required><br>
                    <label for="password">ENTER PASSWORD</label><br>
                    <input type="password" id="pasword" name="pasword" required><br>
                    <input type="checkbox" onclick="showPassword()"><br>Show password<br>
                    <script>
                    function showPassword() {
                        var x = document.getElementById("pasword");
                        if (x.type === "password") {
                            x.type = "text";
                        } else {
                            x.type = "password";
                        }
                    }
                    document.querySelector('form').addEventListener('submit', function(event) {
                        const email = document.getElementById('email').value;
                        const password = document.getElementById('pasword').value;
                        if (!isValidEmail(email)) {
                            alert('Please enter a valid email address.');
                            event.preventDefault();
                        } else if (password.length !== 8) {
                            alert('Password must be 8 characters long.');
                            event.preventDefault();
                        }
                    });

                    function isValidEmail(email) {
                        // Regular expression for basic email validation
                        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                        return emailRegex.test(email);
                    }
                    </script>
                    <input type="submit" value="Login"><br><br>
                    <a href="official.php" target="_blank">LOGIN AS ADMIN</a>
                </form>



            </div>
        </div>
    </div>
    <br><br>

    <div class="container-fluid" style="height:auto">
        <h3 id="about us" style="color:blue">ABOUT US</h3>
        <div class="row">
            <div class="col-sm-3 p-3 bg-primary text-white" style="height:auto">

                <div class=" rounded-4 hover-div" style="text-align:left;padding: 8px;height:100%;">
                    <h5 style="text-align:center;color:blue">HISTORY</h5>
                    <p>
                        - Tik Traders Sacco is a
                        sacco that was
                        created by a group of traders around the country.<br>
                        -it is welcoming all traders who are willing to join
                        <br>- It has a very strong history on its origin, work and other activities pertaining its
                        members<br>
                        <button class="cnm"><a href="history.html">SEE HISTORY</a></button>
                    </p>
                </div>
            </div>
            <div class="col-sm-3 p-3 bg-primary text-white" style="height:auto">

                <div class=" rounded-4 hover-div" style="text-align:left;padding: 8px;height:100%">
                    <h5 style="text-align:center;color:blue">LOCATION</h5>
                    <p>-We (TIK TRADERS SACCO)
                        are located
                        at mwingi road, nairobi near mwingi
                        villas.</br><br>
                        -Our dirrection bord is on your right hard while driving to nairobi.<br>
                        NB: if you are around mwingi villas and you can't find us please call our customer care for
                        help.<br>
                        <button class="cnm"><a href="location.html">VIEW OUR LOCATION</a></button>
                    </p>
                </div>
            </div>
            <div class="col-sm-3 p-3 bg-primary text-white" style="height:auto">

                <div class=" rounded-4 hover-div" style="text-align:left;padding: 8px;height:100%">
                    <h5 style="text-align:center;color:blue">GOALS</h5>
                    <p>-Tik we are guided by
                        our:<br>
                        1.Vision<br>
                        2.Mission<br>
                        3.Strategic plans<br>
                        4.Core values<br>
                        5.Our importance<br>
                        6.Members advice<br>
                        7.Rule of law<br>
                        <button class="cnm"><a href="aims.html">SEE OUR GOALS</a></button>
                    </p>
                </div>
            </div>
            <div class="col-sm-3 p-3 bg-primary text-white" style="height:auto">
                <div class="rounded-4 hover-div" style="text-align:left;padding: 8px;height:100%">

                    <h5 style="text-align:center;color:blue">ADMINISTRATION</h5>
                    <p>-This SACCO is made up of
                        combination of powers<br> -We value our
                        members.<br>
                        -TIK is ruled by Members through representative.<br>
                        Representatives amends rules on behave of the Members.<br>- Any one can be a
                        representative.<br>
                        <button class="cnm"><a href="activities.html">SEE ADMINISTRATORS</a></button>
                    </p>
                </div>
            </div>
        </div>

    </div><br>
    <br>
    <div class="container-fluid" style="height:auto">
        <h3 id="membership" style="color:blue;">MEMBERSHIP</h3>

        <div class="row">
            <div class="col-sm-6 p-3 bg-dark text-white">
                <div class="rounded-5 bg-dark" style="height:100%;">
                    <img src="membership.jpeg" style="width:100%; height:100%">
                </div>
            </div>
            <div class="col-sm-6 p-3 bg-dark text-white">
                <div class="rounded-4 bg-secondary" style="height:100%;">
                    <h5 style="color:blue" id="loans">Welcome to TIK SACCO!</h5>
                    <h6>We are delighted to have you join our community.<br>
                        To become a member, please follow these steps:</h6></br>
                    <p style="text-align:left;color:white; padding:10px">
                        1. Fill out the membership application form in this link:<a href="register.html"
                            style="color:blue;">&nbsp;LINK TO
                            REGISTRATION FORM</a> <br>
                        2. Make sure you fill it with real details.</br>
                        3. Once your application is approved, you can login in our members website using your
                        details.</br>
                        4. Register for savings and for loans, You can deposit some amount too.</br>
                        5. Once you deposit your are qualified for a loan twice your deposit.</br>
                        6. You are also qualified for other membership benefits and services.</br><br>
                        Feel free to reach out to our staff if you have any questions or need assistance.<br>
                        You can too visit us in our offices for any service you need</br>
                        <br>
                    </p>
                    <h4>Note</h4>
                    Some registration fee will be required before you join the sacco.<br>
                    WELCOME!
                    </p>
                </div>
            </div>
        </div>
    </div>
    <br><br>
    <div class="container-fluid" style="height:auto">
        <h3 id="SERVICES" style="color:blue">SERVICES</h3>
        <div class="row">
            <div class="col-sm-6 p-3 bg-primary text-dark">
                <div class="rounded-4 bg-white" style="height:100%;background-image: url('loancover.avif');">
                    <h5 style="color:blue" id="loans">LOANS</h5>
                    <P style="text-align:left;padding:8px;color:black"> -In loans section we welcome every
                        member to get
                        as much loan
                        as he/she could provided he/she
                        meets the requirement<br>
                        -You have the rights to monitor your loan balance and limits<br>
                        -BE aware of penalties too...<br>
                        -Late payments, or any unethical behavior to this ASSOCIATION, MEMBER(S), OFFICIAL(S) or any
                        thing
                        that may affect the organization either directly or in directly left you under penalty
                        consequence.<br>
                        -You have to be a member to get LOANS services<br>
                        If you are not a member.<br>
                        <button class="cnm" style="color:white"><a href="register.html">JOIN US</a></button> <br>
                        If you are a member.<br>
                        <button class="cnm" style="color:white"><a href="#login">LOG IN</a></button>
                    </P>
                </div>
            </div>
            <div class="col-sm-6 p-3 bg-primary text-dark">
                <div class="rounded-4 bg-white" style="height:100%;background-image: url('/img/savecover.avif');">
                    <h5 style="color:blue" id="savings">SAVINGS</h5>
                    <P style="text-align:left;padding:8px;color:black">
                        -Members can asses all saving rights here.<br>
                        -By these savings a member can use them as a guarantor.<br>
                        -You have rights to withdraw your savings any time.<br>
                        - We encourage our members to save more so that they can get more loans<br>
                        - Unfortunately to get these service you have to be a member.<br>
                        If you are not a member.<br>
                        <button class="cnm" style="color:white"> <a href="register.html">JOIN US</a></button> <br>
                        If you are a member<br>
                        <button class="cnm" style="color:white"><a href="#login">LOG IN</a></button>
                    </P>
                </div>
            </div>
            <div class="col-sm-6 p-3 bg-primary text-dark">
                <div class="rounded-4 bg-white" style="height:100%;background-image: url('marry go round cover.jpg');">
                    <h5 style="color:blue" id="marry go round">MARRY GO ROUND</h5>
                    </h5>
                    <P style="text-align:left;padding:8px; color:black"> -Our members can help each other by
                        participating
                        to marry go
                        round<br>
                        -By the help of our officials they organize them selves so that each can have his/her
                        turn to
                        benefit from this project.<br>
                        - It is not a mandatory service so willing members have to register to before
                        participating.<br>
                        -Unfortunately to get these service you have to be a member.<br>
                        If you are not a member.<br>
                        <button class="cnm" style="color:white"><a href="register.html">JOIN US</a></button> <br>
                        If you are a member<br>
                        <button class="cnm" style="color:white"><a href="#login">LOG IN</a></button>
                    </P>
                </div>
            </div>
            <div class="col-sm-6 p-3 bg-primary text-dark">
                <div class="rounded-4 bg-white" style="height:100%; background-image: url('/img/advertcover.avif');">
                    <h5 style="color:blue" id="advertisement">ADVERTISEMENT</h5>
                    <P style="text-align:left;padding:8px;color:black"> -TIK TRADERS SACCO been a sacco of
                        traders
                        <br>-Allows his
                        members to share what they are
                        selling.<br>
                        - We give them an opportunity to buy from each other through website and by the help of our
                        officials
                        for free.<br>
                        -You have to be a member to get this service<br>
                        If you are not a member.<br>
                        <button class="cnm" style="color:white"><a href="register.html">JOIN US</a></button> <br>
                        If you are a member<br>
                        <button class="cnm" style="color:white"><a href="#login">LOG IN</a></button>
                    </P>
                </div>
            </div>
        </div>
    </div><br><br>
    <div class="container-fluid,icons ">
        <h3 id="communication" style="color:blue">OUR MEDIAS</h3>
        <div class="rounded-pill bg-secondary">
            <h5 style="text-align:center;color:blue;padding:8px">OUR MEDIAS</h5>
            <p style="text-align:left;padding-left: 30%;">-Follow us on all our medias to get all our updates on
                time.<br>
                -You can view other peoples reactions or react on these social medias<br>
                -Please make sure you maintain ethics<br>
                -Respect other peoples privacy<br>
            <h5 style="text-align:center;color:blue;padding:8px"> FOLLOW US ON:</h5><br>
            <p class="hover-image" style="color:yellow"><a
                    href="https://www.facebook.com/groups/1573846976142159/?__tn__=%3C">
                    <ion-icon name="logo-facebook"></ion-icon> facebook
                </a> <br>
                <a
                    href="https://www.instagram.com/ibit_universal__traders?utm_source=ig_web_button_share_sheet&igsh=ZDNlZDc0MzIxNw==">
                    <ion-icon name="logo-instagram"></ion-icon> Instagram
                </a><br>
                <a href="https://twitter.com/ChisSacco/header_photo">
                    <ion-icon name="logo-twitter"></ion-icon>X
                </a><br>
            </p>
        </div>

        </p>
    </div>
    </div><br><br>
    <div>
        <div class="container-fluid" style="height:auto;background-color:#666666; ">
            <h3 id="partners" style="color:blue">PARTNERS</h3>
            <p style="text-align:left;padding:8px;">
            <h5>OUR PARTNERS</h5>
            <p style="color:white">- We have signed agreements with other organizations, both governmental and
                non-governmental, with the
                aim of ensuring traders are well catered for.</p><br>
            <p style="text-align:center;color:blue"> Some of the organizations are:</p><br>
            <p class="hover-image">
                <a href="https://ke.kcbgroup.com"><img src="kcb.png" alt="kcb"
                        style="height:4cm;width:4cm;padding:6px"></a>
                <a href="https://www.nairobi.go.ke"><img src="nairobi.jpeg" alt="nairobi county "
                        style="height:4cm;width:4cm;padding:6px;"></a>
                <a href="https://www.trade.go.ke"><img src="trade.jpeg" alt="trading ministry"
                        style="height:4cm;width:4cm;padding:6px"></a>
                <a href="https://www.compassion.com"><img src="compassion.jpeg" alt="compassion international"
                        style="height:4cm;width:4cm;padding:6px"></a>
                <a href="https://www.wto.org"><img src="word trade.png" alt="world trade organization"
                        style="height:4cm;width:4cm;padding:6px"></a>
            </p>
            </p>
            <br><br>
        </div>
    </div>
    </div><br><br>
    <div class="container-fluid">
        <h3 id="contacts" style="color:blue">OUR CONTACTS</h3>

        <div class="container bg-secondary" style="width:auto;height:auto; color:white">
            <h5 style="text-align:center;color:blue">CUSTOMER CARE</h5>
            -Meet our customer care group via these medias to get help.<br>
            -Our customer care groups works only during working hours<br>
            -(8am-5pm)on week days<br>
            -(8am-3pm) on saturday<br>
            -(2pm-4pm) on sunday<br>
            <h5>Contacts are:</h5>
            <p class="hover-image">
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
                    style="text-decoration: none;text-align: left;font-size:160%;">
                    <img src="email.jpg" alt="email" style="height: 40px; width: 40px;"></a>
            </p>
        </div>
    </div><br><br>
    <div class="container-fluid bg-warning" style="color:black">
        <div class="row">
            <div class="col-sm-3">
                <h>SERVICES</h><br>
                <a href="#loans">Loans</a><br>
                <a href="#savings">Savings</a><br>
                <a href="#advertisement">Advertisement</a><br>
                <a href="#marry go round">Marry go round</a><br>
            </div>
            <div class="col-sm-3">
                <h>ABOUT US</h><br>
                <a href="history.html">History</a><br>
                <a href="aims.html">Goals</a><br>
                <a href="location.html">Location</a><br>
                <a href="activities.html">Administration</a><br>
            </div>
            <div class="col-sm-3">
                <h>POLICIES</h><br>
                <a href="goverment.html">Goverment rules</a><br>
                <a href="association.html">Tik traders rules</a><br>
            </div>
            <div class="col-sm-3">
                <h>CUSTOMER CARE</h><br>
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
                <a href="https://api.whatsapp.com/send/?phone=%2B254716140575&text&type=phone_number&app_absent=0"
                    style="text-align: left;font-size:160%;" class="whatsapp-icon" id="whatsappIcon"> <img
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
                    style="text-decoration: none;text-align: left;font-size:160%;">
                    <img src="email.jpg" alt="email" style="height: 40px; width: 40px;"></a></a><br><br><br>
                <h>OUR MEDIAS</h><br>
                <a href="https://www.facebook.com/groups/1573846976142159/?__tn__=%3C">
                    <ion-icon name="logo-facebook"></ion-icon>
                </a>
                <a
                    href="https://www.instagram.com/ibit_universal__traders?utm_source=ig_web_button_share_sheet&igsh=ZDNlZDc0MzIxNw==">
                    <ion-icon name="logo-instagram"></ion-icon>
                </a>
                <a href="https://twitter.com/ChisSacco/header_photo">
                    <ion-icon name="logo-twitter"></ion-icon>
                </a>
                <br>
            </div>
        </div>
    </div>
    <script src="https://unpkg.com/ionicons@5.4.0/dist/ionicons.js">
    </script>
    <footer style="background-color: black; color: white;;padding-top: 24px;padding-bottom: 24px;">
        &#174Developed by tik web developing limited company&#8482 @timothykimanzi &#169; 2024 &#9830; &#9830; &#9830;
        0716140575 &#9830;&#9830;</footer>
</body>

</html>