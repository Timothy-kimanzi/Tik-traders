<!DOCTYPE html>
<html>

<head>
    <title>try</title>
</head>

<body>
    <?php
        $fname =filter_input(INPUT_POST, 'fname');
        $password =filter_input(INPUT_POST, 'password');
        
                $host ="localhost";
                $dbusername="root";
                $dbpassword="";
                $dbname="try";
                $conn = new mysqli ($host, $dbusername, $dbpassword, $dbname);
                if (mysqli_connect_error()){
                    die('connect error ('.mysqli_connect_errno().') '.mysqli_connect_error());
                }
                else{
                    $sql = "INSERT INTO fm ( fname, password) values('$fname', '$password')";
                    if($conn->query($sql)){
                        echo "new record is inserted succefully";
                    }
                    else{
                        echo "error".$sql."<br".$conn->error;
                    }
                    $conn->close();
                }
          
        ?>

    <h>DESCRIPTION</h>
    Goals and strategic objectives

</body>

</html>