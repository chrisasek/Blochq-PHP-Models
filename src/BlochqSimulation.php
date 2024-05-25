<?php
class BlochqSimulation extends BlochqRequest
{
    private $_endpoint;

    function __construct()
    {
        $this->_endpoint = parent::getEndpoint('accounts');
        parent::__construct();
    }


    // Credit account
    public function Creditaccount($body)
    {
        /*
        [
            'account_id' => '640b045929eb9cf45bc720d3',
            'amount' => 900000
        ]
        */
        $endpoint = $this->_endpoint.'/credit/manual';
        return $this->post($body, $endpoint);
    }


    // Debit account
    public function Debitaccount($body)
    {
        /*
        [
            'account_id' => '640b045929eb9cf45bc720d3',
            'amount' => 900000
        ]
        */
        $endpoint = $this->_endpoint.'/debit/manual';
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
