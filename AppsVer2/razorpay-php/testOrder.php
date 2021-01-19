<?php
echo "order1->".$order;

include("Razorpay.php");
use Razorpay\Api\Api;
echo "order2->".$order;
$api_key = 'rzp_live_abEAlYmmQUzUCg';
// $api_key = 'rzp_test_aNY9pateh9pWYw';

$api_secret = 'BvrldbyJ1smnv3wU6LEa3QTX';
// $api_secret = 'BvrldbyJ1smnv3wU6LEa3QTX';
echo "order3->".$order;
$api = new Api($api_key, $api_secret);
echo "order4->".$order;
$client  = $client->order->create(
['receipt'=>'order_rcptid_11',
'amount'=>500,
'currency'=>'INR',
'payment_capture'=>'0'
]);

echo "order5->".$order;


?>