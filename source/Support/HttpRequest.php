<?php

namespace Source\Support;

class HttpRequest
{

    private function post(array $data, string $apiUrl, string $endpoint, string $apiKey): void
    {
        $url = $apiUrl . $endpoint;

        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($this->build)); //http_build_query(array_merge($this->build, $apiKey))
        curl_setopt($ch, CURLOPT_HTTPHEADER, []);
        $this->callback = json_decode(curl_exec($ch));
        curl_close($ch);
    }

    private function get(int $id, string $apiUrl, string $endpoint, string $apiKey): void
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



    public function put(int $id, array $data, string $apiUrl, string $endpoint, string $apiKey): void
    {
        $url = $apiUrl . $endpoint . "/" . $id;

        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");
        curl_setopt($ch, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_0);
        curl_setopt($ch, CURLOPT_HEADER, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 0);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            "Content-Type: application/json",
            "oauth-token: {$this->apiKey}"
        ));

        $json_arguments = json_encode($data);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $json_arguments);
        $this->callback = json_decode(curl_exec($ch));

        echo json_encode(array("status" => "Updated Record Name:" . $this->callback->name));
        curl_close($ch);
    }

    public function delete(int $id, string $apiUrl, string $endpoint, string $apiKey): void
    {
        $url = $apiUrl . $endpoint . "/" . $id;

        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "DELETE");
        curl_setopt($ch, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_0);
        curl_setopt($ch, CURLOPT_HEADER, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 0);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            "Content-Type: application/json",
            "oauth-token: {$this->apiKey}"
        ));

        echo json_encode(array("status" => "Deleted Record:" . $this->callback->id));
        curl_close($ch);
    }
}
