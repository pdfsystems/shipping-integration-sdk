<?php

namespace Pdfsystems\ShippingIntegrationSdk;

use Pdfsystems\ShippingIntegrationSdk\Dtos\Order;
use Pdfsystems\ShippingIntegrationSdk\Dtos\Tracking;
use Rpungello\SdkClient\SdkClient;
use Spatie\DataTransferObject\Exceptions\UnknownProperties;

class ShippingSdkClient extends SdkClient
{
    /**
     * Submits an order to the shipping API. If this order already exists it will be updated, otherwise a new one will
     * be created. In either case, the resulting order is returned.
     *
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
     * @throws UnknownProperties
     */
    public function getTrackingNumbersForApp(int $appId, ?int $lastId = null): array
    {
        return $this->getDtoArray('tracking', Tracking::class, [
            'source' => $appId,
            'id' => $lastId,
        ]);
    }
}
