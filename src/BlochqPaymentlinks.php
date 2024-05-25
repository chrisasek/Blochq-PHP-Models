<?php
class BlochqPaymentlinks extends BlochqRequest
{
    private $_endpoint;

    function __construct()
    {
        $this->_endpoint = parent::getEndpoint('paymentlinks');
        parent::__construct();
    }


    // Create Payment Link
    public function CreatePaymentLink($body)
    {
        /*
        [
            'name' => 'AmG',
            'description' => 'Project Adam',
            'currency' => 'NGN',
            'amount' => 500000
        ]
        */
        return $this->post($body, $this->_endpoint);
    }


    // Edit Payment Link
    public function Editpaymentlink($body, $linkId)
    {

        /*
        [
            'name' => 'AmG',
            'description' => 'Project Adam',
        ]
        */
        return $this->put($body, $this->_endpoint . "/{$linkId}");
    }


    // Edit Payment Link
    public function Deletepaymentlink($id)
    {
        return $this->delete(null, $this->_endpoint . "/{$id}");
    }




    // Get paymentlinks
    public function Getpaymentlinks()
    {
        return $this->get($this->_endpoint);
    }


    // Get paymentlinks by ID
    public function Getpaymentlinkbyid($linkId)
    {
        return $this->get($this->_endpoint . "/{$linkId}");
    }


    // Get paymentlinks by ID
    public function GetpaymentlinkbyLinkId($linkId)
    {
        return $this->get("https://api.blochq.io/v1/link/{$linkId}");
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
