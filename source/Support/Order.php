<?php

namespace Source\Support;

class Order
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

    /*  method: post
        "modelo_carro": "string",
        "protocolo_montadora": 0,
        "dt_pedido": "2019-11-21T02:32:14.849Z",
        "dt_entrega": "2019-11-21T02:32:14.849Z",
        "dt_retirada": "2019-11-21T02:32:14.849Z",
        "cliente": "string",
        "concessionaria": "string"

    */

    public function placeOrder(Client $cpf, Dealership $dealership, string $car_model, int $automaker_protocol): Order
    {
        $this->endpoint = "/pedidos";
        $this->build = [
            "cliente" => $cpf,
            "concessionaria" => $dealership,
            "modelo_carro" => $car_model,
            "protocolo_montadora" => $automaker_protocol
        ];

        $this->httpRequest::post($this->build,$this->apiUrl, $this->endpoint, $this->apiKey);
        return $this;
    }

    
    
}
