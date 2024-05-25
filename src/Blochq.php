<?php
class Blochq extends BlochqRequest
{
    private
        $_data,
        $_dataUsed = null,

        $_token = 'sk_test_65976dff2fce7d69652faa8865976dff2fce7d69652faa89',
        $_type = array('savings', 'virtual'),

        $_endpoints = array(
            'account' => 'https://api.blochq.io/v1/accounts',
            'customers' => 'https://api.blochq.io/v1/customers',
            'bills' => 'https://api.blochq.io/v1/bills',
        );

    function __construct()
    {
        parent::__construct();
    }



    /* 
        Customers: Manage customers in Bloc
    */

    // Get Customers
    public function GetCustomers($id = null)
    {
        $endpoint = $id ? $this->_endpoints['customers'] . '/' . $id : $this->_endpoints['customers'];
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
        return $this->post($body, $this->_token, $this->_endpoints['customers']);
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
        return $this->put($body, $this->_token, $this->_endpoints['customers'] . "/$customerID");
    }

    // Get Customers Means of Identification
    public function MeansofIdentification()
    {
        return $this->get($this->_endpoints['customers'] . "/means/identity");
    }

    // Get Customers Means of Identification
    public function RevalidateCustomerKYC($customerID)
    {
        return $this->get($this->_endpoints['customers'] . "/kyc/revalidate/{$customerID}");
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
        return $this->put($body, $this->_endpoints['customers'] . "/upgrade/t1/{$customerID}");
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
        return $this->put($body, $this->_endpoints['customers'] . "/upgrade/t2/{$customerID}");
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
        return $this->put($body, $this->_endpoints['customers'] . "/upgrade/t2/v2/{$customerID}");
    }

    // Get Upgrade Customer KYC Tier 3
    public function UpgradeCustomerToKYCT3($body, $customerID)
    {
        /*
        [
            'image' => 'base64/image'
        ]
        */
        return $this->put($body, $this->_endpoints['customers'] . "/upgrade/t3/{$customerID}");
    }



    /* 
        Bill Payment: Pay bills with the Bloc API
    */

    // Get Bills
    public function Getsupportedbills()
    {
        $endpoint = $this->_endpoints['bills'] . '/supported';
        return $this->get($endpoint);
    }

    // Get Bill Operators
    public function Getsupportedoperators($operator)
    {
        $endpoint = $this->_endpoints['bills'] . '/operators?bill=' . $operator;
        return $this->get($endpoint);
    }

    // Get Bill Operator Products
    public function Getoperatorproducts($product, $operatorID)
    {
        $endpoint = $this->_endpoints['bills'] . "/operators/$operatorID/products?bill=$product";
        return $this->get($endpoint);
    }

    // Get Bill Operator Products
    public function Customerdevicevalidation($meter_type, $device_number, $product, $operatorID)
    {
        $endpoint = $this->_endpoints['bills'] . "/customer/validate/$operatorID?meter_type=$meter_type&bill=$product&device_number=$device_number";
        return $this->get($endpoint);
    }

    // Make Bill Payment
    public function MakeBillPayment($product, $body)
    {
        /* 
        {
        "success": true,
        "data": {
            "created_at": "2023-08-03T05:56:59.500621",
            "status": "successful",
            "amount": 30000,
            "reference": "247c5bb817fe4a9f96c3937079a1e679",
            "customer_name": "MR TUNDE OLUNDEGUN",
            "operator_id": "op_iZMtH6S6PxG3A7T9geNXqV",
            "product_id": "prd_YCtiAW4pnvM3DrCe3SM2Do",
            "bill_type": "electricity",
            "meta_data": {
            "operator_name": "IKEDC",
            "token": ""
            }
        },
        "message": "make payment"
        }
        */
        return $this->post($body, $this->_token, $this->_endpoints['bills'] . "/payment?bill=$product");
    }


    // CURL
    // ~ POST
    // function post($body, $endpoint)
    // {
    //     $curl = curl_init();
    //     curl_setopt_array($curl, [
    //         CURLOPT_URL => $endpoint,
    //         CURLOPT_RETURNTRANSFER => true,
    //         CURLOPT_ENCODING => "",
    //         CURLOPT_MAXREDIRS => 10,
    //         CURLOPT_TIMEOUT => 30,
    //         CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    //         CURLOPT_CUSTOMREQUEST => "POST",
    //         CURLOPT_POSTFIELDS => json_encode($body),
    //         CURLOPT_HTTPHEADER => [
    //             "accept: application/json",
    //             "authorization: Bearer $this->_token",
    //             "content-type: application/json"
    //         ],
    //     ]);

    //     $response = curl_exec($curl);
    //     $err = curl_error($curl);

    //     curl_close($curl);

    //     if ($err) {
    //         return $err;
    //     } else {
    //         $response = json_decode($response);
    //         // if ($response->success) {
    //         //     return $response->data;
    //         // }

    //         return $response;
    //     }
    // }
    // // ~ PUT
    // function put($body, $endpoint)
    // {
    //     $curl = curl_init();
    //     curl_setopt_array($curl, [
    //         CURLOPT_URL => $endpoint,
    //         CURLOPT_RETURNTRANSFER => true,
    //         CURLOPT_ENCODING => "",
    //         CURLOPT_MAXREDIRS => 10,
    //         CURLOPT_TIMEOUT => 30,
    //         CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    //         CURLOPT_CUSTOMREQUEST => "PUT",
    //         CURLOPT_POSTFIELDS => json_encode($body),
    //         CURLOPT_HTTPHEADER => [
    //             "accept: application/json",
    //             "authorization: Bearer $this->_token",
    //             "content-type: application/json"
    //         ],
    //     ]);

    //     $response = curl_exec($curl);
    //     $err = curl_error($curl);

    //     curl_close($curl);

    //     if ($err) {
    //         return $err;
    //     } else {
    //         $response = json_decode($response);
    //         // if ($response->success) {
    //         //     return $response->data;
    //         // }

    //         return $response;
    //     }
    // }
    // // ~ GET
    // function get($endpoint)
    // {
    //     $curl = curl_init();
    //     curl_setopt_array($curl, [
    //         CURLOPT_URL => $endpoint,
    //         CURLOPT_RETURNTRANSFER => true,
    //         CURLOPT_ENCODING => "",
    //         CURLOPT_MAXREDIRS => 10,
    //         CURLOPT_TIMEOUT => 30,
    //         CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    //         CURLOPT_CUSTOMREQUEST => "GET",
    //         CURLOPT_HTTPHEADER => [
    //             "accept: application/json",
    //             "authorization: Bearer $this->_token"
    //         ],
    //     ]);

    //     $response = curl_exec($curl);
    //     $err = curl_error($curl);

    //     curl_close($curl);

    //     if ($err) {
    //         return $err;
    //     } else {
    //         $response = json_decode($response);
    //         // if ($response->success) {
    //         //     return $response->data;
    //         // }

    //         return $response;
    //     }
    // }

    // TEST
    public function test()
    {
        return "Test working";
    }
}
