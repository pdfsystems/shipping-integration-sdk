<?php

namespace Pdfsystems\ShippingIntegrationSdk;

use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\HandlerStack;
use Pdfsystems\ShippingIntegrationSdk\Dtos\Tracking;
use Rpungello\SdkClient\SdkClient;
use Spatie\DataTransferObject\Exceptions\UnknownProperties;

class ShippingSdkClient extends SdkClient
{
    public function __construct(public string $tenantId, public string $authToken, string $baseUri = 'https://shipping.pdfsystems.com', HandlerStack $handler = null)
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

    /**
     * Gets new tracking numbers from the shipping API
     *
     * @param int $lastId
     * @return Tracking[]
     * @throws GuzzleException
     * @throws UnknownProperties
     */
    public function getTrackingNumbers(int $lastId = 0): array
    {
        return $this->getDtoArray('tracking', Tracking::class, [
            'id' => $lastId,
        ]);
    }
}
