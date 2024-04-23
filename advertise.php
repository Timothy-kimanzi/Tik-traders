<?php



        $product_name =filter_input(INPUT_POST, 'product_name');
        $business_name=filter_input(INPUT_POST, 'business_name');
        $price=filter_input(INPUT_POST,'price');
        $category=filter_input(INPUT_POST, 'category');
        $phone_number =filter_input(INPUT_POST, 'phone_number');
        $product_picture=filter_input(INPUT_POST, 'product_picture');
                $host ="localhost";
                $dbusername="root";
                $dbpassword="";
                $dbname="test";
                $conn = new mysqli ($host, $dbusername, $dbpassword, $dbname);
                if (mysqli_connect_error()){
                    die('connect error ('.mysqli_connect_errno().') '.mysqli_connect_error());
                }
                else{
                    $uploads = "./public/uploads";
                    
                    if (isset($_FILES['product_picture'])) {
                        $uploadDir = "./public/uploads/";
                        $uploadFile = $uploadDir . basename($_FILES['product_picture']['name']);

              if(move_uploaded_file($_FILES['product_picture']['tmp_name'], $uploadFile)) {
                            $imagePath = $uploadFile;
                            
                            $sql = "INSERT INTO advertise ( product_name, business_name, price, category, phone_number, product_picture) values('$product_name', '$business_name', '$price', '$category', '$phone_number', '$imagePath')";
                    if($conn->query($sql)){
                        echo "uploading is completed successfully<br><a href='traders.html'><button>OKEY</button></a>";
                    }
                    else{
                        echo "please try again<a href='share.html'";
                        
                    }
                    $conn->close();
                        }
                    }
                    
                }
        ?>