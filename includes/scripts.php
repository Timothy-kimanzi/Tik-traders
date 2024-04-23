  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  <script src="vendor/chart.js/Chart.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="js/demo/chart-area-demo.js"></script>
  <script src="js/demo/chart-pie-demo.js"></script>


  <?php


$connection = mysqli_connect("localhost","root","","test");

if(isset($_POST['registerbtn']))
{
    $host = "localhost";
        $dbusername = "root";
        $dbpassword = "";
        $dbname = "test";
        $conn = new mysqli($host, $dbusername, $dbpassword, $dbname);

        // Check connection
        if (mysqli_connect_error()) {
            die('Connect Error ('.mysqli_connect_errno().') '.mysqli_connect_error());
        } else {
            // Check if the email already exists in the database
            $check_query = "SELECT * FROM officials WHERE EMAIL = '$EMAIL'";
            $check_result = $conn->query($check_query);
            if ($check_result->num_rows > 0) {
                // Redirect to login page or display a message indicating that the email is already registered
                echo "This email is already registered.<br><a href='ADMIN.html'><button>Please login</button></a>";
            } else {
                // Proceed with registration
                $sql = "INSERT INTO officials (NAME, EMAIL, P_NUMBER, WNAME, ID, POSITION, pasword) 
                        VALUES ('$NAME', '$EMAIL', '$P_NUMBER', '$WNAME', '$ID', '$POSITION', '$pasword')";

                if ($conn->query($sql))
        {
            echo "done";
            $_SESSION['success'] =  "Admin is Added Successfully";
            header('Location: register.php');
        }
        else 
        {
            echo "not done";
            $_SESSION['status'] =  "Admin is Not Added";
            header('Location: register.php');
        }
    }
}

}

?>