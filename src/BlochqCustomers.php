<?php
class BlochqCustomers extends BlochqRequest
{
    private
        $_data,
        $_dataUsed = null,

        $_token = 'sk_test_65976dff2fce7d69652faa8865976dff2fce7d69652faa89',
        $_type = array('savings', 'virtual'),
        $_endpoints =  'https://api.blochq.io/v1/customers';

    function __construct($token = null)
    {
        $this->_token = isset($GLOBALS['blochq_token']) ? $GLOBALS['blochq_token'] : $token;
        parent::__construct($this->_token);
    }



    /* 
        Customers: Manage customers in Bloc
    */

    // Get Customers
    public function GetCustomers($id = null)
    {
        $endpoint = $id ? $this->_endpoints . '/' . $id : $this->_endpoints;
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
        return $this->post($body, $this->_token, $this->_endpoints);
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
        return $this->put($body, $this->_token, $this->_endpoints . "/$customerID");
    }

    // Get Customers Means of Identification
    public function MeansofIdentification()
    {
        return $this->get($this->_endpoints . "/means/identity");
    }

    // Get Customers Means of Identification
    public function RevalidateCustomerKYC($customerID)
    {
        return $this->get($this->_endpoints . "/kyc/revalidate/{$customerID}");
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
        return $this->put($body, $this->_endpoints . "/upgrade/t1/{$customerID}");
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
        return $this->put($body, $this->_endpoints . "/upgrade/t2/{$customerID}");
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
        return $this->put($body, $this->_endpoints . "/upgrade/t2/v2/{$customerID}");
    }

    // Get Upgrade Customer KYC Tier 3
    public function UpgradeCustomerToKYCT3($body, $customerID)
    {
        /*
        [
            'image' => 'base64/image'
        ]
        */
        return $this->put($body, $this->_endpoints . "/upgrade/t3/{$customerID}");
    }
    

    // TEST
    public function test()
    {
        echo "Test working";
    }
}
