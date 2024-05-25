<?php
class BlochqBills extends BlochqRequest
{
    private
        $_token = 'sk_test_65976dff2fce7d69652faa8865976dff2fce7d69652faa89',
        $_endpoints = 'https://api.blochq.io/v1/checkout/';

    function __construct($token = null)
    {
        $this->_token = isset($GLOBALS['blochq_token']) ? $GLOBALS['blochq_token'] : $token;
        parent::__construct($this->_token);
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
