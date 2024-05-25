<?php
class BlochqBills extends BlochqRequest
{
    private $_endpoints = 'https://api.blochq.io/v1/checkout/';

    function __construct()
    {
        parent::__construct();
    }

    // Create Checkout
    public function CreateCheckout($body)
    {
        /*
        [
        'customer_email' => 'amplepay.ng@gmail.com',
        'customer_name' => 'Joy Nduaguibe',
        'country' => 'Nigeria',
        'amount' => 100000
        ]
        */
        $endpoint = $this->_endpoints . '/new';
        return $this->post($body, $endpoint);
    }

    // TEST
    public function test()
    {
        echo "Test working";
    }
}
