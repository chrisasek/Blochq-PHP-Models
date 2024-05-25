<?php
class BlochqAccounts extends BlochqRequest
{
    private $_endpoint;

    function __construct()
    {
        $this->_endpoint = parent::getEndpoint('accounts');
        parent::__construct();
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



    // Credit account
    public function Creditaccount($body)
    {
        /*
        [
            'account_id' => '640b045929eb9cf45bc720d3',
            'amount' => 900000
        ]
        */
        $endpoint = $this->_endpoint . '/credit/manual';
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
