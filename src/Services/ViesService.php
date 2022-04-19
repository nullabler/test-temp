<?php

namespace App\Services;

class ViesService
{

    /**
     * @var \SoapClient
     */
    private $client;

    public function __construct($wsdl)
    {
        $this->client = new \SoapClient(
            $wsdl,
            [
                'features' => SOAP_SINGLE_ELEMENT_ARRAYS,
                'trace' => 1,
            ]
        );
    }

    public function verify($code, $number)
    {
        $result = null;

        try {
            $response = $this->client->checkVat([
                'countryCode' => $code,
                'vatNumber' => $number
            ]);

            $response->valid
                && $result = $response;
        } catch (\SoapFault $e) {
        }

        return $result;
    }

}
