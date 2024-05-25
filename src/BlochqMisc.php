<?php
class BlochqMisc extends BlochqRequest
{
    private $_endpoint;

    function __construct()
    {
        $this->_endpoint = parent::getEndpoint('misc');
        parent::__construct();
    }


    // Get list of banks
    public function Getlistofbanks()
    {
        $endpoint = $this->_endpoint['banks'];
        return $this->get($endpoint);
    }


    // Resolve Account
    public function ResolveAccount()
    {
        $endpoint = $this->_endpoint['resolve-account'];
        return $this->get($endpoint);
    }


    // Get Exchange Rate
    public function Getexchangerate($currencyPair = 'USD-NGN')
    {
        $endpoint = $this->_endpoint['rates'] . "/currencies/{$currencyPair}";
        return $this->get($endpoint);
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
