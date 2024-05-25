<?php
class BlochqCheckout extends BlochqRequest
{
    private $_endpoint;

    function __construct()
    {
        $this->_endpoint = parent::getEndpoint('checkout');
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
        $endpoint = $this->_endpoint . '/new';
        return $this->post($body, $endpoint);
    }

    
    // Preview Endpoint
    public function Endpoint()
    {
        return $this->_endpoint;
    }

    // TEST
    public function test()
    {
        echo "Test working";
    }
}
