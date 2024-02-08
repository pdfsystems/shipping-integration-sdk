<?php

namespace Pdfsystems\ShippingIntegrationSdk;

use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\HandlerStack;
use Pdfsystems\ShippingIntegrationSdk\Dtos\Order;
use Pdfsystems\ShippingIntegrationSdk\Dtos\Tracking;
use Rpungello\SdkClient\SdkClient;
use Spatie\DataTransferObject\Exceptions\UnknownProperties;

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

    /**
     * Submits an order to the shipping API. If this order already exists it will be updated, otherwise a new one will
     * be created. In either case, the resulting order is returned.
     *
     * @throws GuzzleException
     * @throws UnknownProperties
     */
    public function submitOrder(Order $order): Order
    {
        return $this->postDto('order', $order);
    }

    /**
     * Gets new tracking numbers from the shipping API
     *
     * @return Tracking[]
     *
     * @throws GuzzleException
     * @throws UnknownProperties
     */
    public function getTrackingNumbers(?int $lastId = null): array
    {
        return $this->getDtoArray('tracking', Tracking::class, [
            'id' => $lastId,
        ]);
    }

    /**
     * Gets new tracking numbers from the shipping API
     *
     * @return Tracking[]
     *
     * @throws GuzzleException
     */
    public function getTrackingNumbersForApp(int $appId, int $lastId = 0): array
    {
        return $this->getDtoArray('tracking', Tracking::class, [
            'source' => $appId,
            'id' => $lastId,
        ]);
    }
}
