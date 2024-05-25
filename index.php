<?php
require('config.php');

$GLOBALS['blochq_token'] = 'sk_test_65976dff2fce7d69652faa8865976dff2fce7d69652faa89';

$Blochq = new Blochq();
$BlochqCustomers = new BlochqCustomers();


// Testing
print_r($BlochqCustomers->GetCustomers());

// print_r($Blochq->createCustomer(array(
//     'email' => 'chrisasek@gmail.com',
//     'phone_number' => '08093930950',
//     'first_name' => 'Chris',
//     'last_name' => 'Chris',
//     'customer_type' => 'Personal',
//     'bvn' => 'Chris',
// )));
