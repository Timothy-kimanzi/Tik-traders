<!DOCTYPE html>
<html>

<head>
    <title>View products penalties</title>
    <style>
    #k {
        width: auto;
        max-width: fit-content;
        height: fit-content;
        height: auto;
        margin: 20px auto;
        padding: 10px;
        background-color: white;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        text-align: center;
        color: blue;
    }

    table {
        margin: 0 auto;
        font-size: 16px;
        border-collapse: collapse;
    }

    table th,
    table td {
        padding: 10px;
        /* Adjust the padding around each cell */
        border: 1px solid #ddd;
    }

    table th {
        font-weight: bold;
        background-color: #f2f2f2;
    }

    table img {
        max-width: 70px;
        max-height: 70px;
    }

    h2 {
        color: black;
    }
    </style>
</head>

<body>
    <div id="k">
        <h2>Penalties Available</h2>
        <table>
            <tr>
                <th>Id</th>
                <th>Email</th>
                <th>Business no.</th>
                <th>Save P. Reason</th>
                <th>Registration P. Reason</th>
                <th>Marry-go-round P. Reason</th>
                <th>Advertisement P. Reason</th>
                <th>Loan P. Reason</th>
                <th>Penalty</th>
                <th>Action</th>
            </tr>
            <?php
            // Database connection parameters
            $host = "localhost";
            $username = "root";
            $password = "";
            $database = "test";

            // Connect to the database
            $conn = new mysqli($host, $username, $password, $database);

            // Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            // Query to retrieve data from the database
            $sql = "SELECT * FROM penalty";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row["id"] . "</td>";
                    echo "<td>" . $row["email"] . "</td>";
                    echo "<td>" . $row["business_number"] . "</td>";
                    echo "<td>" . $row["save_p_reason"] . "</td>";
                    echo "<td>" . $row["registration_p_reason"] . "</td>";
                    echo "<td>" . $row["marrygoround_p_reason"] . "</td>";
                    echo "<td>" . $row["advertisement_p_reason"] . "</td>";
                    echo "<td>" . $row["loan_p_reason"] . "</td>";
                    echo "<td>" . $row["penalty"] . "</td>";
                    echo "<td>";
                    // Check if penalty is zero, if yes, display delete link, else display message
                    if ($row["penalty"] == 0) {
                        echo "<a href='delete_penalty.php?id=".$row['id']."'>Delete</a>";
                    } else {
                        echo "Not settled";
                    }
                    echo "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='9'>No penalties found</td></tr>";
            }
            // Close database connection
            $conn->close();
            ?>
        </table>
        <button><a href="loans admin.php">Go Back</a> </button>
    </div>
</body>

</html>