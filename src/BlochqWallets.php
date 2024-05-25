<?php
class BlochqWallets extends BlochqRequest
{
    private $_endpoint;


    function __construct()
    {
        $this->_endpoint = parent::getEndpoint('wallets');
        parent::__construct();
    }


    // Create Wallet
    public function CreateWallet($body)
    {
        /*
        [
            'customer_id' => '64c9e81497880d4b259cec77',
            'preferred_bank' => 'Banc Corp',
            'alias' => 'Business'
        ]
        */
        return $this->post($body, $this->_endpoint);
    }


    // Get Wallets
    public function GetWallets()
    {
        return $this->get($this->_endpoint);
    }


    // Get Wallet by id
    public function GetWalletbyid($walletID)
    {
        return $this->get($this->_endpoint . "/{$walletID}");
    }


    // Get Customer Wallets
    public function GetCustomerWallets($customerID)
    {
        return $this->get($this->_endpoint . "/customers/{$customerID}");
    }


    // Debit Customer Wallets
    public function DebitWallet($body)
    {
        /*
        [
            'wallet_id' => '64cb2b7d73152af277afcb5d',
            'amount' => 30000
        ]
        */
        return $this->post($body, $this->_endpoint . "/debit/manual");
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
