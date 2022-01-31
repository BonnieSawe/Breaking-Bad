<?php

namespace App\Services;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;

class FetchData
{
    /**
     * @var Client
     */
    protected $client;
    /**
     * @var string
     */
    protected $base_url;

    public function __construct()
    {
        $this->client = new Client();
        $this->base_url = 'https://www.breakingbadapi.com/api/';
    }

    /**
     * @throws GuzzleException
     */
    public function getData($endpoint)
    {
        $response = $this->client->get("$this->base_url$endpoint");

        return json_decode($response->getBody());
    }
}
