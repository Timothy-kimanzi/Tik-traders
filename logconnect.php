<html>

<head>
    <title>login connection</title>
    <link rel="icon" type="image/x-icon" href="trader.png">
</head>

<body>
    <?php
        $host= "localhost";
        $dbusername="root";
        $password="";
        $dbname="try";
        $conn = new mysqli ($host, $dbusername, $password, $dbname, );
        if(!$conn){
            echo "connection failed!";
        }
        header("");
        exit();
        ?>
</body>

</html>