<?php
class BlochqCustomers extends BlochqRequest
{
    private $_endpoint;

    function __construct($token = null)
    {
        $this->_endpoint = parent::getEndpoint('customers');
        parent::__construct();
    }



    /* 
        Customers: Manage customers in Bloc
    */

    // Get Customers
    public function GetCustomers($id = null)
    {
        $endpoint = $id ? $this->_endpoint . '/' . $id : $this->_endpoint;
        return $this->get($endpoint);
    }

    // Create Customers
    public function CreateCustomer($body)
    {
        /* BODY
        [
            'email' => 'chrisasek@gmail.com',
            'phone_number' => '08093930950',
            'first_name' => 'Chris',
            'last_name' => 'Asek',
            'customer_type' => 'personal',
            'bvn' => '1234567890'
        ]
        */
        return $this->post($body, $this->_endpoint);
    }

    // Update Customers
    public function UpdateCustomer($customerID, $body)
    {
        /* BODY
        [
            'address' => [
                'street' => 'OFFICE 216',
                'city' => 'Uyo',
                'state' => 'Akwa Ibom',
                'country' => 'Nigeria',
                'postal_code' => '520001'
            ],
            'email' => 'chrisasek@gmail.com',
            'phone_number' => '08093930950',
            'bvn' => '1234567890',
            'customer_type' => 'personal'
        ]
        */
        return $this->put($body, $this->_endpoint . "/$customerID");
    }

    // Get Customers Means of Identification
    public function MeansofIdentification()
    {
        return $this->get($this->_endpoint . "/means/identity");
    }

    // Get Customers Means of Identification
    public function RevalidateCustomerKYC($customerID)
    {
        return $this->get($this->_endpoint . "/kyc/revalidate/{$customerID}");
    }

    // Get Upgrade Customer KYC Tier 1
    public function UpgradeCustomerToKYCT1($body, $customerID)
    {
        /*
        [
            'address' => [
                'street' => 'OFFICE 216',
                'city' => 'Uyo',
                'state' => 'Akwa Ibom',
                'country' => 'Nigeria',
                'postal_code' => '520001'
            ],
            'image' => 'base64/image',
            'place_of_birth' => 'Lagos',
            'dob' => '1996-04-07',
            'gender' => 'Male',
            'country' => 'Nigeria'
        ]
        */
        return $this->put($body, $this->_endpoint . "/upgrade/t1/{$customerID}");
    }

    // Get Upgrade Customer KYC Tier 2
    public function UpgradeCustomerToKYCT2($body, $customerID)
    {
        /*
        [
            'image' => 'data:image/jpeg;base64',
            'means_of_id' => 'NIN Slip'
        ]
        */
        return $this->put($body, $this->_endpoint . "/upgrade/t2/{$customerID}");
    }

    // Get Upgrade Customer KYC Tier 2 - V2
    public function UpgradeCustomertoKYC2v2($body, $customerID)
    {
        /*
        [
            'image' => 'data:image/jpeg;base64',
            'means_of_id' => 'NIN Slip'
        ]
        */
        return $this->put($body, $this->_endpoint . "/upgrade/t2/v2/{$customerID}");
    }

    // Get Upgrade Customer KYC Tier 3
    public function UpgradeCustomerToKYCT3($body, $customerID)
    {
        /*
        [
            'image' => 'base64/image'
        ]
        */
        return $this->put($body, $this->_endpoint . "/upgrade/t3/{$customerID}");
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
