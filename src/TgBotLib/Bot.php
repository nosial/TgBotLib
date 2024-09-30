<?php

namespace TgBotLib;

class Bot
{
    private string $token;
    private string $endpoint;

    public function __construct(string $token, string $endpoint='https://api.telegram.org')
    {
        $this->token = $token;
        $this->endpoint = $endpoint;
    }

    public function setToken(string $token): void
    {
        $this->token = $token;
    }

    public function getToken(): string
    {
        return $this->token;
    }

    public function setEndpoint(string $endpoint): void
    {
        $this->endpoint = $endpoint;
    }

    public function getEndpoint(string $method=null): string
    {
        if($method)
        {
            return sprintf('%s/bot%s/%s', $this->endpoint, $this->token, $method);
        }

        return $this->endpoint;
    }

    public function sendRequest(string $method, array $parameters=[]): array
    {

    }
}