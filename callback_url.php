<?php
 		header("Content-Type: application/json");

     $response = '{
 "MerchantRequestID": "fc4d-4eb0-84ab-6b523dc39a55496878",
  "CheckoutRequestID": "ws_CO_08042024133441101798007218",
  "ResponseCode": "0",
  "ResponseDescription": "Success. Request accepted for processing",
  "CustomerMessage": "Success. Request accepted for processing"
 "ResultCode": 0, 
  "ResultDesc": "Confirmation Received Successfully"
     }';
 
     // DATA
     $mpesaResponse = file_get_contents('php://input');
 
     // log the response
     $logFile = "M_PESAConfirmationResponse.txt";
 
     // write to file
     $log = fopen($logFile, "a");
 
     fwrite($log, $mpesaResponse);
     fclose($log);
 
     echo $response;