<!doctype>
<html>

<head>
    <title>staff login</title>
    <link rel="icon" type="image/x-icon" href="trader.png">

</head>

<body>
    <?php
       $host = "localhost";
       $username = "root";
       $password = "";
       $database = "test";
    
       if (isset($_POST['email']) && isset($_POST['pasword']) && isset($_POST['POSITION'])){
        function validation($data){
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }

// Database connection


$connection = new mysqli($host, $username, $password, $database);

if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}

// Retrieve user input
$username = validation($_POST['email']);
$password = validation($_POST['pasword']);
$POSITION = validation($_POST['POSITION']);
// Check user credentials
$sql = "SELECT * FROM officials WHERE email = ? and pasword = ? and POSITION= ?";
$stmt = $connection->prepare($sql);
$stmt->bind_param("sss", $username, $password, $POSITION);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows == 1) {
    switch ($POSITION) {
        case "registration":
          header("location:Registration admin.php");
          break;
          case "loans":
            header("location:loans admin.php");
            break;
            case "savings":
                header("location:saving admin.php");
                break; 
                case "marry go round":
                    header("location:marry go round admin.php");
                    break; 
                    case "advertisements":
                        header("location:advertisement admin.php");
                        break; 
        default:
          echo "you are not an official!";
          
      }
      
         // User is authenticated; redirect to the home page
    }
else {
    // Authentication failed; display an error message or redirect back to the login page
    
    
    echo("You are not an official<br><a href='tik home.php'>okay</a>");
}

$connection->close();
}
       

       ?>
</body>

</html>