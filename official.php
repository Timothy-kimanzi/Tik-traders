<!DOCTYPE html>
<html>

<head>
    <title>LOGIN</title>
    <link rel="icon" type="image/x-icon" href="trader.png">
    <style>
    body {
        text-align: center;
    }

    p {
        color: white;
    }

    .container {
        width: 350px;
        height: 350px;
        background-color: black;
        margin: 0 auto;
        padding: 5%;
    }

    h1,
    h2,
    p {
        color: white;
    }

    input[type="email"],
    input[type="password"],
    #POSITION {
        background-color: cornsilk;
        color: blue;
        margin-bottom: 10px;
        padding: 5px;
        width: 100%;
        box-sizing: border-box;
        color: blue;
        border-radius: 10px;
        border: 1px solid #ccc;
    }

    input[type="submit"],
    input[type="reset"] {
        border: none;
        padding: 10px 20px;
        cursor: pointer;
        border-radius: 5px;
        margin-right: 10px;
    }
    </style>
</head>

<BODY style="text-align: center; background-image:url(cover2.jpg );">
    <div style="text-align: center; width: 350PX; height: 350PX; background-color:gray;margin-left: 35%;padding: 5%;">
        <h1>ADMINS LOGIN</h1>
        <h1>HELLO</h1>
        <p id="greeting"></p>
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

            document.getElementById("greeting").innerText = greeting;
        }
        displayGreeting();
        </script>
        <P style="text-align: center;">
        <form action="stafflogin.php" method="post">
            <label for="secname">ENTER YOUR EMAIL </label></br>
            <input type="EMAIL" id="email" name="email" required
                style="background-color: cornsilk;color: blue;width:250px;"></br>
            <label for="POSITION">position </label></br>
            <select id="POSITION" name="POSITION" required style="background-color: cornsilk;color: blue;width:250px;">
                <option value=""></option>
                <option value="loans">Loans</option>
                <option value="savings">Savings</option>
                <option value="marry go round">Marry go round</option>
                <option value="advertisements">Advertisements</option>
                <option value="registration">Registration</option>
            </select>
            </br>
            <label for="pasword">ENTER PASSWORD</label></br>
            <input type="password" id="pasword" name="pasword" required
                style="background-color: cornsilk;color: blue;width:250px;"><BR>
            <input type="checkbox" onclick="myfunction()">show password</br>
            <script>
            function myfunction() {
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
                } else if (!isValidPhoneNumber(phoneNumber)) {
                    alert('Phone number must start with "07" or "01" and have 10 digits.');
                    event.preventDefault();
                }
            });

            function isValidEmail(email) {
                // Regular expression for basic email validation
                const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                return emailRegex.test(email);
            }
            </script>
            <input type="submit" style="background-color: blueviolet;color:white;">
            <input type="reset" style="background-color: blueviolet;color:white;">
        </form>
        </P>
    </div>
</BODY>

</html>