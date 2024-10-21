<?php
namespace Services;

class BonusPlusService {
    private $apiKey;
    private $baseUri;

    public function __construct() {
        $this->baseUri = 'https://api.bonusplus.pro/';
        $this->apiKey = 'C2B347AC-2C92-4F89-913D-AB0587FEA08D';
    }

    private function sendRequest($method, $endpoint, $data = null) {
        $url = $this->baseUri . $endpoint;
        $ch = curl_init();

        $headers = [
            'Authorization: Bearer ' . $this->apiKey,
            'Content-Type: application/json'
        ];

        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $method);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

        if ($data) {
            curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
        }

        $response = curl_exec($ch);
        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

        if (curl_errno($ch)) {
            throw new \Exception('Request Error: ' . curl_error($ch));
        }

        curl_close($ch);

        if ($httpCode >= 400) {
            throw new \Exception('HTTP Error: ' . $httpCode . ' - ' . $response);
        }

        return json_decode($response, true);
    }

    public function getCustomer($phone) {
        return $this->sendRequest('GET', "customer?phone=$phone");
    }

    public function createOrUpdateCustomer($customerData) {
        return $this->sendRequest('POST', 'customer', $customerData);
    }

    public function calculateOrder($orderData) {
        return $this->sendRequest('PUT', 'retail/calc', $orderData);
    }

    public function reserveBonuses($reserveData) {
        return $this->sendRequest('PATCH', 'customer/balance/reserve', $reserveData);
    }

    public function completeOrder($orderData) {
        return $this->sendRequest('POST', 'retail', $orderData);
    }

    public function returnOrder($returnData) {
        return $this->sendRequest('PUT', 'retail/back', $returnData);
    }
}