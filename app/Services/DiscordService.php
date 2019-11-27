<?php

namespace App\Services;

use GuzzleHttp\Client;
use Illuminate\Config\Repository;

class DiscordService
{
    /**
     * @var \GuzzleHttp\Client
     */
    protected $httpClient;

    /**
     * @var \Illuminate\Config\Repository
     */
    protected $config;

    /**
     * DiscordService constructor.
     *
     * @param \GuzzleHttp\Client $httpClient
     * @param \Illuminate\Config\Repository $config
     */
    public function __construct(Client $httpClient, Repository $config)
    {
        $this->httpClient = $httpClient;
        $this->config = $config;
    }

    /**
     * Send a message to webhook
     *
     * @param string $message
     * @return bool
     */
    public function send(string $message) : bool
    {
        $payload = [
            'content' => $message,
            'tts' => false,
        ];

        $response = $this->httpClient->post($this->config->get('discord.webhook'), [
            'json' => $payload,
        ]);

        return $response->getStatusCode() === 200;
    }
}
