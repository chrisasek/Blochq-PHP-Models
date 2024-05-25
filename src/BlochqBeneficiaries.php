<?php
class BlochqBeneficiaries extends BlochqRequest
{
    private $_endpoint;

    function __construct()
    {
        $this->_endpoint = parent::getEndpoint('beneficiaries');
        parent::__construct();
    }


    // Create Beneficiary
    public function CreateBeneficiary($body)
    {
        /*
        [
            'currency' => 'NGN',
            'accountNumber' => '2011713547',
            'bankCode' => '090581'
        ]
        */
        return $this->post($body, $this->_endpoint);
    }


    // Update Beneficiary
    public function UpdateBeneficiary($body, $id)
    {

        /*
        [
            'bankCode' => '090581',
        ]
        */
        return $this->put($body, $this->_endpoint . "/{$id}");
    }


    // Delete Beneficiary
    public function Deletebeneficiary($id)
    {
        return $this->delete(null, $this->_endpoint . "/{$id}");
    }


    // Get Beneficiary by ID
    public function GetBeneficiarybyid($id)
    {
        return $this->get($this->_endpoint . "/{$id}");
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
