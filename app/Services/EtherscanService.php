<?php
namespace App\Services;

use GuzzleHttp\Client;

class EtherscanService
{
    protected $client;
    protected $apiKey;

    public function __construct()
    {
        $this->apiKey = env('ETHERSCAN_API_KEY');
        $this->client = new Client(['base_uri' => 'https://api.etherscan.io/api']);
    }

    public function getContractTransactions($contractAddress)
    {
        $response = $this->client->request('GET', '', [
            'query' => [
                'module' => 'account',
                'action' => 'txlist',
                'address' => $contractAddress,
                'startblock' => 0,
                'endblock' => 99999999,
                'sort' => 'asc',
                'apikey' => $this->apiKey
            ]
        ]);
    
        $transactions = json_decode($response->getBody(), true);
    
        // Format transactions to include only necessary fields
        return array_map(function ($transaction) {
            return [
                'hash' => $transaction['hash'],
                'method' => 'N/A', // Etherscan API doesn't provide a direct method field
                'blockNumber' => $transaction['blockNumber'],
                'timeStamp' => $transaction['timeStamp'],
                'from' => $transaction['from'],
                'to' => $transaction['to'],
                'value' => $transaction['value'],
            ];
        }, $transactions['result']);
    }

    public function getTokenBalance($contractAddress, $address)
{
    $response = $this->client->request('GET', '', [
        'query' => [
            'module' => 'account',
            'action' => 'tokenbalance',
            'contractaddress' => $contractAddress,
            'address' => $address,
            'tag' => 'latest',
            'apikey' => $this->apiKey
        ]
    ]);

    return json_decode($response->getBody(), true);
}

// In app/Services/EtherscanService.php

public function getTokenTransactions($contractAddress)
{
    $response = $this->client->request('GET', '', [
        'query' => [
            'module' => 'account',
            'action' => 'tokentx',
            'contractaddress' => $contractAddress,
            'startblock' => 0,
            'endblock' => 99999999,
            'sort' => 'asc',
            'apikey' => $this->apiKey
        ]
    ]);

    return json_decode($response->getBody(), true);
}


    
}
