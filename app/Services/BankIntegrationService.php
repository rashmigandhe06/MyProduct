<?php

namespace App\Services;

use GuzzleHttp\Exception\RequestException;

class BankIntegrationService
{
    public function getBankAPIAccessToken($data): array
    {
        try {
            $client = new \GuzzleHttp\Client();
            $myBody['grant_type'] = "authorization_code";
            $myBody['client_id'] = env('CLIENT_ID');
            $myBody['client_secret'] = env('CLIENT_SECRET');
            $myBody['redirect_uri'] = env('REDIRECT_URL');
            $myBody['code'] = $data['code'];
            $response = $client->request('POST', $data['url'], ['form_params' => $myBody]);
            return ["status" => $response->getStatusCode(), "data" => json_decode($response->getBody()->getContents())];
        } catch (RequestException $e) {
            return ["status" => $e->getResponse()->getStatusCode(), "data" => $e->getResponse()->getReasonPhrase()];
        }

    }

    public function getUserBankAccountList($data): array
    {

        $headers = [
            'Authorization' => "Bearer ".session('access_token_val'),
            'Accept'        => 'application/json',
        ];

        try {
            $client = new \GuzzleHttp\Client();
            $response = $client->request('GET', $data['url'], [
                'headers' => $headers
            ]);

            return ["status" => $response->getStatusCode(), "data" => $response->getBody()->getContents()];
        } catch (RequestException $e) {
            return ["status" => $e->getResponse()->getStatusCode(), "data" => $e->getResponse()->getReasonPhrase()];
        }
    }

    public function getUserAccountTransactionList($data): array
    {

        $headers = [
            'Authorization' => "Bearer ".session('access_token_val'),
            'Accept'        => 'application/json',
        ];

        try {
            $client = new \GuzzleHttp\Client();
            $response = $client->request('GET', $data['url'], [
                'headers' => $headers
            ]);

            return ["status" => $response->getStatusCode(), "data" => $response->getBody()->getContents()];
        } catch (RequestException $e) {
            return ["status" => $e->getResponse()->getStatusCode(), "data" => $e->getResponse()->getReasonPhrase()];
        }

    }
}
