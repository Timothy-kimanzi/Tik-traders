<?php
        $product_name =filter_input(INPUT_POST, 'product_name');
        $business_name=filter_input(INPUT_POST, 'business_name');
        $price=filter_input(INPUT_POST,'price');
        $category=filter_input(INPUT_POST, 'category');
        $phone_number =filter_input(INPUT_POST, 'phone_number');
        $customer_number =filter_input(INPUT_POST, 'customer_number');
        $quntity =filter_input(INPUT_POST, 'quntity');
                $host ="localhost";
                $dbusername="root";
                $dbpassword="";
                $dbname="test";
                $conn = new mysqli ($host, $dbusername, $dbpassword, $dbname);
                if (mysqli_connect_error()){
                    die('connect error ('.mysqli_connect_errno().') '.mysqli_connect_error());
                }
                else{
                    $sql = "INSERT INTO orders ( product_name, business_name, price, category, phone_number, customer_number, quntity) values('$product_name', '$business_name', '$price', '$category', '$phone_number', '$customer_number', '$quntity')";
                    if($conn->query($sql)){
                        echo "Order as been placed successfully......wait as we process your order.<br><a href='view.php'>OKAY</a>";
                    }
                    else{
                        echo "order not placed...<br><a href='view.php'>try again!</a>";
                    }
                    $conn->close();
                }
        ?>
</body>

</html>