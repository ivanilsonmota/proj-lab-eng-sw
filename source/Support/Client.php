<?php

namespace Source\Support;

class Client
{
    private $apiUrl;
    private $apiKey;
    private $endpoint;
    private $build;
    private $callback;
    private $httpRequest;

    public function __construct()
    {
        $this->apiUrl = "/api";
        $this->apiKey = "";
        $this->httpRequest = new HttpRequest();
    }

    //Storage the data returned of api.
    public function callback()
    {
        return $this->callback;
    }

}
