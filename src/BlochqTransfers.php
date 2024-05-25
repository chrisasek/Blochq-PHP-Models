<?php
class BlochqTransfers extends BlochqRequest
{
    private $_endpoint;

    function __construct()
    {
        $this->_endpoint = parent::getEndpoint('transfers');
        parent::__construct();
    }


    // Transfer From A Fixed Account
    public function TransferFromAFixedAccount($body)
    {
        /*
        [
            'amount' => 10000,
            'bank_code' => '058',
            'account_number' => '2020202020',
            'narration' => 'from jerry',
            'reference' => 'REF2bbbfa09f11688558067066',
            'account_id' => '64cb260d73152af277afcb53'
        ]
        */
        return $this->post($body, $this->_endpoint);
    }


    // Transfer From Organization Balance
    public function TransferFromOrganizationBalance($body)
    {
        /*
        [
            'amount' => 10000,
            'bank_code' => '011',
            'account_number' => '3061930950',
            'reference' => '89dfkelsn3400emdkd14903j344223dd232ed13',
            'narration' => 'Your  money'
        ]
        */
        return $this->get($body, $this->_endpoint . "/balance");
    }


    // Internal transfer
    public function InternalTransfer($body)
    {
        /*
        [
            'amount' => 10000,
            'from_account_id' => '6410616d7f1b4b36103f872b',
            'to_account_id' => '64105fdd7f1b4b36103f870f',
            'narration' => 'test transaction',
            'reference' => '617849033kd44223dvs232cd13'
        ]
        */
        return $this->get($body, $this->_endpoint . "/internal");
    }


    // Bulk transfer
    public function BulkTransfer($body)
    {
        /*
        [
            'bulk_list' => [
                [
                        'amount' => 1000,
                        'bank_code' => '090110',
                        'account_number' => '1012233362',
                        'narration' => 'Bulk Test',
                        'reference' => '68314903j344223dd232ed13'
                ]
            ],
            'account_id' => '640b045929eb9cf45bc720d2'
        ]
        */
        return $this->get($body, $this->_endpoint . "/bulk");
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
