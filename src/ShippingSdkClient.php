<?php

namespace Pdfsystems\ShippingIntegrationSdk;

use GuzzleHttp\HandlerStack;
use Rpungello\SdkClient\SdkClient;

class ShippingSdkClient extends SdkClient
{
    public function __construct(public string $tenantId, public string $authToken, string $baseUri = 'https://shipping.pdfsystems.com', ?HandlerStack $handler = null)
    {
        parent::__construct($baseUri, $handler);
    }

    protected function getGuzzleClientConfig(): array
    {
        $config = parent::getGuzzleClientConfig();

        $config['base_uri'] = "{$config['base_uri']}/$this->tenantId/api/";
        $config['headers']['authorization'] = "Bearer $this->authToken";

        return $config;
    }
}
