<?php
class BlochqDisputes extends BlochqRequest
{
    private $_endpoint;

    function __construct()
    {
        $this->_endpoint = parent::getEndpoint('dispute');
        parent::__construct();
    }


    // Get Card Disputes
    public function GetCardDisputes()
    {
        return $this->get($this->_endpoint);
    }


    // Get a Card Dispute
    public function GetCardDispute($disputeID)
    {
        return $this->get($this->_endpoint . "/{$disputeID}");
    }


    // Get Card Dispute Reasons
    public function GetCardDisputeReasons()
    {
        return $this->get($this->_endpoint . '/reasons');
    }


    // Create Card Dispute
    public function CreateCardDispute($body)
    {
        /*
        [
            'meta_data' => [
                'payment' => 'fraudulent payment'
            ],
            'transaction_id' => '6437d9b03260fa1c251dd21d',
            'reason' => 'fraudulent',
            'explanation' => 'Some explanation about the fraudulent activity, that I can explain'
        ]
        */
        return $this->post($body, $this->_endpoint);
    }


    // Create Card Dispute
    public function UpdateCardDispute($body, $disputeID)
    {
        /*
        [
            'meta_data' => [
                'payment' => 'fraudulent payment'
            ],
            'transaction_id' => '6437d9b03260fa1c251dd21d',
            'reason' => 'fraudulent',
            'explanation' => 'Some explanation about the fraudulent activity, that I can explain'
        ]
        */
        return $this->put($body, $this->_endpoint . "/{$disputeID}");
    }


    // Preview Endpoints
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
