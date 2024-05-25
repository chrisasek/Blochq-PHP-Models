<?php
class BlochqAccounts extends BlochqRequest
{
    private
        $_token = 'sk_test_65976dff2fce7d69652faa8865976dff2fce7d69652faa89',
        $_type = array('savings', 'virtual'),

        $_endpoint = 'https://api.blochq.io/v1/accounts';

    function __construct($token = null)
    {
        $this->_token = isset($GLOBALS['blochq_token']) ? $GLOBALS['blochq_token'] : $token;
        parent::__construct($this->_token);
    }

    // Create Fixed Account
    public function CreateFixedAccount($body)
    {
        /*
        [
            'customer_id' => '64c9e81497880d4b259cec77',
            'preferred_bank' => 'Banc Corp',
            'alias' => 'business',
            'collection_rules' => [
                'amount' => 30000,
                'frequency' => 1
            ]
        ] */
        return $this->post($body, $this->_endpoint);
    }

    // Get All Accounts
    public function GetAccounts()
    {
        return $this->get($this->_endpoint);
    }

    // Create Collection Account
    public function CreateCollectionAccount($body)
    {
        /*
        [
            'preferred_bank' => 'Providus',
            'alias' => 'Business',
            'collection_rules' => [
                'amount' => 30000,
                'frequency' => 2
            ]
        ]
        */
        return $this->post($body, $this->_endpoint . '/collections');
    }


    // Get All Collection Accounts
    public function GetCollectionAccounts()
    {
        return $this->get($this->_endpoint . '/collections');
    }

    // Get Account by id
    public function GetAccountByID($accountID)
    {
        return $this->get($this->_endpoint . "/$accountID");
    }

    // Get Account by account number
    public function GetAccountByAccountNumber($accountNumber)
    {
        return $this->get($this->_endpoint . "/$accountNumber");
    }

    // Get customer accounts
    public function GetCustomerAccounts($customerID)
    {
        return $this->get($this->_endpoint . "/customers/accounts/$customerID");
    }

    // Get Organisation Default Accounts
    public function GetOrganisationDefaultAccounts()
    {
        return $this->get($this->_endpoint . "/organization/default");
    }

    // Freeze Account
    public function FreezeAccount($body, $accountID)
    {
        /*
        [
            'reason' => 'bad kyc details'
        ]
        */
        return $this->put($body, $this->_endpoint . "/$accountID/freeze");
    }

    // Unfreeze Account
    public function UnfreezeAccount($body, $accountID)
    {
        /*
        [
            'reason' => 'bad kyc details'
        ]
        */
        return $this->put($body, $this->_endpoint . "/$accountID/unfreeze");
    }

    // Close Account
    public function CloseAccount($body, $accountID)
    {
        /*
        [
            'reason' => 'bad kyc details'
        ]
        */
        return $this->put($body, $this->_endpoint . "/$accountID/close");
    }

    // ReOpen Account
    public function ReOpenAccount($body, $accountID)
    {
        /*
        [
            'reason' => 'bad kyc details'
        ]
        */
        return $this->put($body, $this->_endpoint . "/$accountID/reopen");
    }


    // TEST
    public function test()
    {
        echo "Test working";
    }
}
