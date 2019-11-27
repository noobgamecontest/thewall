<?php

namespace App\Services;

use App\Models\Sentence;
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
     * @param \App\Models\Sentence $sentence
     * @return bool
     */
    public function send(Sentence $sentence) : bool
    {
        $payload = [
            'tts' => false,
            'embeds' => [
                [
                    'color' => 3183048,
                    'title' => $sentence->author,
                    'description' => $sentence->content,
                    'footer' => [
                        'text' => sprintf('Le %s', $sentence->exposed_at->format('d/m/Y')),
                    ]
                ]
            ]
        ];

        $response = $this->httpClient->post($this->config->get('discord.webhook'), [
            'json' => $payload,
        ]);

        return $response->getStatusCode() === 200;
    }
}
