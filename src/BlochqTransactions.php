<?php
class BlochqTransactions extends BlochqRequest
{
    private $_endpoint;

    function __construct()
    {
        $this->_endpoint = parent::getEndpoint('transactions');
        parent::__construct();
    }


    // Get All Transactions
    public function GetAllTransactions($array_query)
    {
        // Param URL = https://docs.blochq.io/reference/getalltransactions
        $query = http_build_query($array_query);

        $endpoint = $this->_endpoint . "?$query";
        return $this->get($endpoint);
    }


    // Get Transaction by Reference
    public function GetTransactionbyReference($reference)
    {
        $endpoint = $this->_endpoint . "/reference/{$reference}";
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
