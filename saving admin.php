<?php
include('includes/header.php'); 
include('includes/savingnavbar.php'); 
?>


<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">SAVING Admin</h1>
        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
    </div>

    <!-- Content Row -->
    <div class="row">

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total Members Saved
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">

                                <h4> <?php
        // Establish connection to the database
        $host = "localhost";
    $dbusername = "root";
    $dbpassword = "";
    $dbname = "test";
    $conn = new mysqli($host, $dbusername, $dbpassword, $dbname);
         // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
    
        // Query to get the total count of registered members
        $sql = "SELECT COUNT(*) AS total_members FROM `save`";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            echo $row["total_members"];
        } else {
            echo "<p>No members found.</p>";
        }

        // Close connection
        $conn->close();
    ?></h4>

                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Total Savings
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                <?PHP $host = "localhost";
                                    $dbusername = "root";
                                    $dbpassword = "";
                                    $dbname = "test";
                                    $conn = new mysqli($host, $dbusername, $dbpassword, $dbname);

                                    // Check connection
                                    if ($conn->connect_error) {
                                    die("Connection failed: " . $conn->connect_error);
                                    }

                                    // Query to get the total amount of money
                                    $sql = "SELECT SUM(amount) AS total_amount FROM `save`";
                                    $result = $conn->query($sql);

                                    if ($result->num_rows > 0) {
                                    $row = $result->fetch_assoc();
                                    echo  $row["total_amount"];
                                    } else {
                                    echo "<p>No transactions found.</p>";
                                    }

                                    // Close connection
                                    $conn->close();
                                    ?>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-comments fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Total withdraws</div>
                            <div class="row no-gutters align-items-center">
                                <div class="col-auto">
                                    <div class="h4 mb-0 mr-3 font-weight-bold text-gray-800">
                                        <?PHP $host = "localhost";
                                    $dbusername = "root";
                                    $dbpassword = "";
                                    $dbname = "test";
                                    $conn = new mysqli($host, $dbusername, $dbpassword, $dbname);

                                    // Check connection
                                    if ($conn->connect_error) {
                                    die("Connection failed: " . $conn->connect_error);
                                    }

                                    // Query to get the total amount of money
                                    $sql = "SELECT SUM(withdraw) AS total_amount FROM withdraw_admin";
                                    $result = $conn->query($sql);

                                    if ($result->num_rows > 0) {
                                    $row = $result->fetch_assoc();
                                    echo  $row["total_amount"];
                                    } else {
                                    echo "<p>No transactions found.</p>";
                                    }

                                    // Close connection
                                    $conn->close();
                                    ?>
                                    </div>
                                </div>
                                <div class="col">

                                </div>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Pending Requests Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Total Penalty </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                <?PHP $host = "localhost";
                                    $dbusername = "root";
                                    $dbpassword = "";
                                    $dbname = "test";
                                    $conn = new mysqli($host, $dbusername, $dbpassword, $dbname);

                                    // Check connection
                                    if ($conn->connect_error) {
                                    die("Connection failed: " . $conn->connect_error);
                                    }

                                    // Query to get the total amount of money
                                    $sql = "SELECT SUM(penalty) AS total_amount FROM penalty";
                                    $result = $conn->query($sql);

                                    if ($result->num_rows > 0) {
                                    $row = $result->fetch_assoc();
                                    echo  $row["total_amount"];
                                    } else {
                                    echo "<p>No transactions found.</p>";
                                    }

                                    // Close connection
                                    $conn->close();
                                    ?>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php
include('includes/scripts.php');
include('includes/footer.php');
?>