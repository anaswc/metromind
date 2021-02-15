<?php
echo "order1->".$order;

include("Razorpay.php");
use Razorpay\Api\Api;
echo "order2->".$order;
$api_key = 'rzp_live_abEAlYmmQUzUCg';
// $api_key = 'rzp_test_qNzNL7FiDVFoQH';

$api_secret = 'Jnkou0WzPZ64R3eF3baAk2j8';
// $api_secret = 'Z89KjX25P47SxYxWRZvp0JL2';//live

// iHloBNTVN4s8CYJzeX8MzxfB
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