<?php

namespace Source\Support;

class Order
{
    private $apiUrl;
    private $apiKey;
    private $endpoint;
    private $build;
    private $callback;

    public function __construct()
    {
        $this->apiUrl = "/api";
        //$this->apiKey = "";
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

        $this->post();
        return $this;
    }

    private function post()
    {
        $url = $this->apiUrl . $this->endpoint;
        //$api = ["apiKey" => $this->apiKey];
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($this->build)); //http_build_query(array_merge($this->build, $apiKey))
        curl_setopt($ch, CURLOPT_HTTPHEADER, []);
        $this->callback = json_decode(curl_exec($ch));
        curl_close($ch);
    }

    private function get(int $id = null)
    {
        if (isset($id)) {
            $url = $this->apiUrl . $this->endpoint . "/" . $id;
        } else {
            $url = $this->apiUrl . $this->endpoint;
        }

        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPGET, true);
        $this->callback = json_decode(curl_exec($ch));
        curl_close($ch);
    }
}
