<?php
class BlochqRequest
{
    private $_token;

    private $_endpoints = array(
        'accounts' => 'https://api.blochq.io/v1/accounts',
        'wallets' => 'https://api.blochq.io/v1/wallets',
        'bills' => 'https://api.blochq.io/v1/bills',
        'dispute' => 'https://api.blochq.io/v1/cards/dispute',
        'cards' => 'https://api.blochq.io/v1/cards',
        'checkout' => 'https://api.blochq.io/v1/checkout',
        'customers' => 'https://api.blochq.io/v1/customers',
        'misc' => array(
            'banks' => 'https://api.blochq.io/v1/banks',
            'resolve-account' => 'https://api.blochq.io/v1/resolve-account',
            'rates' => 'https://api.blochq.io/v1/rates'
        ),
        'transactions' => 'https://api.blochq.io/v1/transactions',
        'transfers' => 'https://api.blochq.io/v1/transfers',
        'webhooks' => 'https://api.blochq.io/v1/webhooks',
        'paymentlinks' => 'https://api.blochq.io/v1/paymentlinks',
        'beneficiaries' => 'https://api.blochq.io/v1/beneficiaries',
    );

    function __construct($token = 'sk_test_65976dff2fce7d69652faa8865976dff2fce7d69652faa89')
    {
        $this->_token = isset($GLOBALS['blochq_token']) ? $GLOBALS['blochq_token'] : $token;
    }

    // CURL
    // ~ POST
    function post($body, $endpoint)
    {
        $curl = curl_init();
        curl_setopt_array($curl, [
            CURLOPT_URL => $endpoint,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => json_encode($body),
            CURLOPT_HTTPHEADER => [
                "accept: application/json",
                "authorization: Bearer $this->_token",
                "content-type: application/json"
            ],
        ]);

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            return $err;
        } else {
            $response = json_decode($response);
            // if ($response->success) {
            //     return $response->data;
            // }

            return $response;
        }
    }

    // ~ PUT
    function put($body, $endpoint)
    {
        $curl = curl_init();
        curl_setopt_array($curl, [
            CURLOPT_URL => $endpoint,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "PUT",
            CURLOPT_POSTFIELDS => json_encode($body),
            CURLOPT_HTTPHEADER => [
                "accept: application/json",
                "authorization: Bearer $this->_token",
                "content-type: application/json"
            ],
        ]);

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            return $err;
        } else {
            $response = json_decode($response);
            // if ($response->success) {
            //     return $response->data;
            // }

            return $response;
        }
    }

    // ~ DELETE
    function delete($body, $endpoint)
    {
        $curl = curl_init();
        curl_setopt_array($curl, [
            CURLOPT_URL => $endpoint,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "DELETE",
            CURLOPT_POSTFIELDS => json_encode($body),
            CURLOPT_HTTPHEADER => [
                "accept: application/json",
                "authorization: Bearer $this->_token",
                "content-type: application/json"
            ],
        ]);

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            return $err;
        } else {
            $response = json_decode($response);
            // if ($response->success) {
            //     return $response->data;
            // }

            return $response;
        }
    }

    // ~ GET
    function get($endpoint)
    {
        $curl = curl_init();
        curl_setopt_array($curl, [
            CURLOPT_URL => $endpoint,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => [
                "accept: application/json",
                "authorization: Bearer $this->_token"
            ],
        ]);

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            return $err;
        } else {
            $response = json_decode($response);
            // if ($response->success) {
            //     return $response->data;
            // }

            return $response;
        }
    }

    // Get Token
    public function getToken()
    {
        return $this->_token;
    }

    public function getEndpoint($point)
    {
        return $this->_endpoints[$point];
    }

    public function test()
    {
        return "Test working";
    }
}
