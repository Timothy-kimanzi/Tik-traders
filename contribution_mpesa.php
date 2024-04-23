<?php
if(isset($_POST['submit'])) {
    date_default_timezone_set('Africa/Nairobi');

    # Access token credentials
    $consumerKey = 'fa5GrHABoYpnL1M0ajYTZO9YDWPoVwp5GkwBie8VJe2RR92T'; // Fill with your app Consumer Key
    $consumerSecret = 'FPZTXokRvobZkq00iAJEyIxxh5ODXDYML6wwgKFBtGa0JPNzPSMhvVYhkojCKZi4'; // Fill with your app Secret

    # M-PESA details
    $BusinessShortCode = '174379';
    $Passkey = 'bfb279f9aa9bdbcf158e97dd71a467cd2e0c893059b10f78e6b72ada1ed2c919';  
    $CallBackURL = 'https://mydomain.com/path';  // Your callback URL

    # Prepare timestamp and password
    $Timestamp = date('YmdHis');    
    $Password = base64_encode($BusinessShortCode.$Passkey.$Timestamp);

    # Prepare headers for access token request
    $headers = ['Content-Type:application/json; charset=utf8'];

    # Access token endpoint
    $access_token_url = 'https://sandbox.safaricom.co.ke/oauth/v1/generate?grant_type=client_credentials';

    # Initiate cURL for access token request
    $curl = curl_init($access_token_url);
    curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);
    curl_setopt($curl, CURLOPT_HEADER, FALSE);
    curl_setopt($curl, CURLOPT_USERPWD, $consumerKey.':'.$consumerSecret);

    # Execute access token request
    $result = curl_exec($curl);
    $status = curl_getinfo($curl, CURLINFO_HTTP_CODE);
    curl_close($curl);

    # Check if access token request was successful
    if ($status != 200) {
        echo "Error fetching access token";
        exit;
    }

    # Decode JSON response and extract access token
    $result = json_decode($result);
    if (!isset($result->access_token)) {
        echo "Access token not found in response";
        exit;
    }

    $access_token = $result->access_token;

    # Prepare headers for STK push
    $stkheader = ['Content-Type:application/json','Authorization:Bearer '.$access_token];

    # Initiate transaction
    $initiate_url = 'https://sandbox.safaricom.co.ke/mpesa/stkpush/v1/processrequest';
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $initiate_url);
    curl_setopt($curl, CURLOPT_HTTPHEADER, $stkheader);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

    # Prepare transaction data
    $curl_post_data = [
        "BusinessShortCode" => $BusinessShortCode,
        "Password" => $Password,
        "Timestamp" => $Timestamp,
        "TransactionType" => "CustomerPayBillOnline",
        "Amount" => $_POST['amount'],
        "PartyA" => $_POST['phone'],
        "PartyB" => $BusinessShortCode,
        "PhoneNumber" => $_POST['phone'],
        "CallBackURL" => $CallBackURL,
        "AccountReference" => "TiK Traders Sacco",
        "TransactionDesc" => "Payment for marry go round"
    ];

    $data_string = json_encode($curl_post_data);
    curl_setopt($curl, CURLOPT_POST, true);
    curl_setopt($curl, CURLOPT_POSTFIELDS, $data_string);

    # Execute transaction request
    $curl_response = curl_exec($curl);
    
    # Decode transaction response
    $response = json_decode($curl_response, true);
    
    # Check if transaction was successful
    if(isset($response['ResponseCode']) && $response['ResponseCode'] == '0') {
        // Transaction was successful, redirect to traders.html
        header('Location: contribute.html');
        exit;
    } else {
        // Transaction failed, echo error message
        echo "Transaction not successful";
    }
}
?>