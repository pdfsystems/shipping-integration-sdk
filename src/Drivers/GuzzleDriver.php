<?php

namespace Pdfsystems\ShippingIntegrationSdk\Drivers;

use GuzzleHttp\HandlerStack;

class GuzzleDriver extends \Rpungello\SdkClient\Drivers\GuzzleDriver
{
    public function __construct(private readonly string $tenantId, private readonly string $authToken, string $baseUri = 'https://shipping.pdfsystems.com', ?HandlerStack $handler = null)
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
