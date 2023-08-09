<?php

namespace Pdfsystems\ShippingIntegrationSdk\Dtos;

use DateTimeImmutable;
use Rpungello\SdkClient\Casters\DateTimeCaster;
use Spatie\DataTransferObject\Attributes\CastWith;
use Spatie\DataTransferObject\Attributes\MapFrom;
use Spatie\DataTransferObject\DataTransferObject;

class Tracking extends DataTransferObject
{
    public int $id;

    public Order $order;

    #[MapFrom('tracking_number')]
    public string $trackingNumber;

    #[MapFrom('customer_reference')]
    public ?string $customerReference;

    #[MapFrom('date_shipped')]
    #[CastWith(DateTimeCaster::class)]
    public ?DateTimeImmutable $dateShipped;

    #[MapFrom('estimated_delivery_date')]
    #[CastWith(DateTimeCaster::class)]
    public ?DateTimeImmutable $estimatedDeliveryDate;

    public ?float $weight;

    #[MapFrom('shipping_charges')]
    public ?float $shippingCharges;

    #[MapFrom('created_at')]
    #[CastWith(DateTimeCaster::class)]
    public ?DateTimeImmutable $created_at;
}
