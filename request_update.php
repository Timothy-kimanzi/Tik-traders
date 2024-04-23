<?php
$email = filter_input(INPUT_POST, 'email');
$business_number = filter_input(INPUT_POST, 'business_number');
$payment = filter_input(INPUT_POST, 'payment');
$mpesa_number = filter_input(INPUT_POST, 'mpesa_number');
$amount = filter_input(INPUT_POST, 'amount');
$duration = filter_input(INPUT_POST, 'duration');
$password = filter_input(INPUT_POST, 'password');

$host = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "test";

// Create connection
$conn = new mysqli($host, $dbusername, $dbpassword, $dbname);

// Check connection
if (mysqli_connect_error()) {
    die('Connect Error (' . mysqli_connect_errno() . ') ' . mysqli_connect_error());
} else {
    // Check if the email exists in the loans database
    $loan_check_query = "SELECT * FROM loans WHERE email='$email'";
    $loan_check_result = $conn->query($loan_check_query);

    if ($loan_check_result->num_rows > 0) {
        // Proceed with the loan application process
        // Retrieve saved amount from the saving table
        $saving_query = "SELECT amount FROM `save` WHERE email='$email' AND `status`='confirmed'";
        $saving_result = $conn->query($saving_query);

        if ($saving_result->num_rows > 0) {
            $saving_row = $saving_result->fetch_assoc();
            $saved_amount = $saving_row['amount'];

            $loan_row = $loan_check_result->fetch_assoc();
            $existing_loan = $loan_row['amount'];

            // Add existing loan amount to the requested amount
            $total_loan_amount = $existing_loan + $amount;

            // Calculate the maximum loan amount
            $max_loan_amount = ($saved_amount * 2) - $total_loan_amount;

            // Check if the requested loan amount is within the limit
            if ($max_loan_amount >= 0) {
                // Calculate interest based on the duration
                $interestRate = 0;
                if ($duration >= 1 && $duration <= 3) {
                  $interestRate = 0.035;
                } elseif ($duration >= 4 && $duration <= 6) {
                  $interestRate = 0.04;
                } elseif ($duration >= 7 && $duration <= 12) {
                  $interestRate = 0.048;
                }
                elseif ($duration >= 13 && $duration <= 24) {
                  $interestRate = 0.06;
                }
                elseif ($duration >= 25 && $duration <= 48) {
                  $interestRate = 0.09;
                }
                elseif ($duration >= 49 && $duration <= 96) {
                  $interestRate = 0.12;
                }
                else {
                  $interestRate = 0.15;
                }

                // Apply interest to the loan amount
                $loan_amount_with_interest = $amount * (1 + ($interestRate / 100));
                $total_loan_amount = $existing_loan + $loan_amount_with_interest;

                // Proceed with the loan application
                $update_query = "UPDATE loans SET business_number='$business_number', payment='$payment', mpesa_number='$mpesa_number', amount='$total_loan_amount', duration='$duration', `password`='$password' WHERE email='$email'";

                if ($conn->query($update_query)) {
                    echo "Loan applied successfully. Please wait for processing.<br><a href='traders.html'><button>OKEY</button></a>";
                    
                } else {
                    echo "Loan application not successful. Please try again.";
                    header("location:request.html");
                }
            } else {
                echo "You cannot request a loan exceeding twice your savings.<br> Please apply for: $max_loan_amount lesser <br><a href='request.html'><button>REQUEST</button></a>";
            }
        } else {
            echo "You have not made any saving...please try again later after saving<br><a href='savings.html'><button>SAVE</button></a>
            <br>
        Otherwise contact customer care for help if you have done the savings.";
        }
    } else {
        echo "You need to register first before applying for a loan.<br><a href='loan_register.html'><button>REGISTER</button></a>
        ";
    }
}
$conn->close();
?>