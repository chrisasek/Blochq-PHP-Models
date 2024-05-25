<?php
class BlochqWebhook extends BlochqRequest
{
    private $_endpoint;

    function __construct()
    {
        $this->_endpoint = parent::getEndpoint('webhooks');
        parent::__construct();
    }


    // Set Webhook
    public function SetWebhook($body)
    {
        /*
        [
            'url' => 'https://4119-105-112-189-13.eu.ngrok.io/api/core/guest/webhook'
        ]
        */
        return $this->post($body, $this->_endpoint);
    }

    
    // Get Webhook
    public function GetWebhook()
    {
        return $this->get($this->_endpoint);
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
