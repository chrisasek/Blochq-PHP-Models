<?php
class BlochqAccounts extends BlochqRequest
{
    private
        $_token = 'sk_test_65976dff2fce7d69652faa8865976dff2fce7d69652faa89',
        $_type = array('savings', 'virtual'),
        $_endpoint = 'https://api.blochq.io/v1/wallets';


    function __construct($token = null)
    {
        $this->_token = isset($GLOBALS['blochq_token']) ? $GLOBALS['blochq_token'] : $token;
        parent::__construct($this->_token);
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


    // TEST
    public function test()
    {
        echo "Test working";
    }
}
