<?php
class BlochqBills extends BlochqRequest
{
    private $_endpoint;

    function __construct()
    {
        $this->_endpoint = parent::getEndpoint('bills');
        parent::__construct();
    }

    /* 
        Bill Payment: Pay bills with the Bloc API
    */

    // Get Bills
    public function Getsupportedbills()
    {
        $endpoint = $this->_endpoint . '/supported';
        return $this->get($endpoint);
    }

    // Get Bill Operators
    public function Getsupportedoperators($operator)
    {
        $endpoint = $this->_endpoint . '/operators?bill=' . $operator;
        return $this->get($endpoint);
    }

    // Get Bill Operator Products
    public function Getoperatorproducts($product, $operatorID)
    {
        $endpoint = $this->_endpoint . "/operators/$operatorID/products?bill=$product";
        return $this->get($endpoint);
    }

    // Get Bill Operator Products
    public function Customerdevicevalidation($meter_type, $device_number, $product, $operatorID)
    {
        $endpoint = $this->_endpoint . "/customer/validate/$operatorID?meter_type=$meter_type&bill=$product&device_number=$device_number";
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
        return $this->post($body, $this->_endpoint . "/payment?bill=$product");
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
