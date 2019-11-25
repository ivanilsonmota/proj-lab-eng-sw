<?php

namespace Source\Support;

class Dealership {
    private $apiUrl;
    private $apiKey;
    private $endpoint;
    private $build;
    private $callback;
    private $htmlRequest;

    public function __construct()
    {
        $this->apiUrl = "/api";
        $this->apiKey = "";
        $this->htmlRequest = new HttpRequest();
    }

    //Storage the data returned of api.
    public function callback()
    {
        return $this->callback;
    }
}
