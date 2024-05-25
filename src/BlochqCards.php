<?php
class BlochqCards extends BlochqRequest
{
    private $_endpoint;

    function __construct()
    {
        $this->_endpoint = parent::getEndpoint('cards');
        parent::__construct();
    }

    // Issue Card
    public function IssueCard($body)
    {
        /*
        [
            'customer_id' => '64c9e81497880d4b259cec77',
            'brand' => 'Verve'
        ]
        */
        return $this->post($body, $this->_endpoint);
    }


    // Fund Card
    public function FundCard($body, $cardID)
    {
        /*
        [
            'amount' => 100000,
            'from_account_id' => '64cb260d73152af277afcb53',
            'currency' => 'NGN'
        ]
        */
        return $this->post($body, $this->_endpoint . "/fund/{$cardID}");
    }


    // Withdraw From Card
    public function WithdrawFromCard($body, $cardID)
    {
        /*
        [
            'amount' => 100000,
            'to_account_id' => '64cb260d73152af277afcb53',
            'currency' => 'NGN'
        ]
        */
        return $this->post($body, $this->_endpoint . "/withdraw/{$cardID}");
    }


    // Change Card PIN
    public function ChangeCardPIN($body, $cardID)
    {
        /*
        [
            'old_pin' => '4639',
            'new_pin' => '1332'
        ]
        */
        return $this->put($body, $this->_endpoint . "/change-pin/{$cardID}");
    }


    // Freeze Card
    public function FreezeCard($cardID)
    {
        return $this->put(null, $this->_endpoint . "/freeze/{$cardID}");
    }


    // UnFreeze Card
    public function UnfreezeCard($cardID)
    {
        return $this->put(null, $this->_endpoint . "/unfreeze/{$cardID}");
    }


    // Block Card
    public function BlockCard($body, $cardID)
    {
        /* 
        [
            'account_id' => '64cb260d73152af277afcb53',
            'reason' => 'lost'
        ]
        */
        return $this->put($body, $this->_endpoint . "/block/{$cardID}");
    }


    // Link Card with Fixed Account
    public function LinkCardwithFixedAccount($body)
    {
        /* 
        [
            'card_id' => '64cc85453162f765c606e9ad',
            'account_id' => '64cb260d73152af277afcb53'
        ]
        */
        return $this->put($body, $this->_endpoint . "/fixed-account/link");
    }


    // Unlink card from Fixed Account
    public function UnlinkcardfromFixedAccount($cardID)
    {
        return $this->put(null, $this->_endpoint . "/fixed-account/unlink/{$cardID}");
    }




    // Get Cards
    public function GetCards()
    {
        return $this->get($this->_endpoint);
    }


    // Get Card by Id
    public function GetCardbyId($cardID)
    {
        return $this->get($this->_endpoint . "/{$cardID}");
    }


    // Get Customer Cards
    public function GetCustomerCards($customerID)
    {
        return $this->get($this->_endpoint . "/customer/{$customerID}");
    }


    // Get Card Secure Data
    public function GetCardSecureData($cardID)
    {
        return $this->get($this->_endpoint . "/secure-data/{$cardID}");
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
