<?php

namespace Pdfsystems\ShippingIntegrationSdk\Dtos;

use Pdfsystems\ShippingIntegrationSdk\Enums\OrderType;
use Rpungello\SdkClient\DataTransferObject;
use Spatie\DataTransferObject\Attributes\CastWith;
use Spatie\DataTransferObject\Attributes\MapFrom;
use Spatie\DataTransferObject\Attributes\MapTo;
use Spatie\DataTransferObject\Casters\EnumCaster;

class Order extends DataTransferObject
{
    public ?int $id;

    #[MapFrom('source_application')]
    #[MapTo('source_application')]
    public int $sourceApplication;

    #[MapFrom('order_type')]
    #[MapTo('order_type')]
    #[CastWith(EnumCaster::class, OrderType::class)]
    public OrderType $orderType;

    #[MapFrom('order_id')]
    #[MapTo('order_id')]
    public string $orderId;

    #[MapFrom('order_number')]
    #[MapTo('order_number')]
    public string $orderNumber;

    #[MapFrom('customer_name')]
    #[MapTo('customer_name')]
    public ?string $customerName;

    #[MapFrom('customer_number')]
    #[MapTo('customer_number')]
    public ?string $customerNumber;

    #[MapFrom('sales_rep_name')]
    #[MapTo('sales_rep_name')]
    public ?string $salesRepName;

    #[MapFrom('sales_rep_code')]
    #[MapTo('sales_rep_code')]
    public ?string $salesRepCode;

    public ?string $sidemark;

    public ?string $comment;

    #[MapFrom('insured_value')]
    #[MapTo('insured_value')]
    public float $insuredValue = 0;

    #[MapFrom('order_total')]
    #[MapTo('order_total')]
    public float $orderTotal = 0;

    #[MapFrom('order_cost')]
    #[MapTo('order_cost')]
    public float $orderCost = 0;

    #[MapFrom('ship_to_name')]
    #[MapTo('ship_to_name')]
    public string $shipToName;

    #[MapFrom('ship_to_attention')]
    #[MapTo('ship_to_attention')]
    public ?string $shipToAttention;

    #[MapFrom('ship_to_street')]
    #[MapTo('ship_to_street')]
    public string $shipToStreet;

    #[MapFrom('ship_to_street2')]
    #[MapTo('ship_to_street2')]
    public ?string $shipToStreet2;

    #[MapFrom('ship_to_city')]
    #[MapTo('ship_to_city')]
    public ?string $shipToCity;

    #[MapFrom('ship_to_state')]
    #[MapTo('ship_to_state')]
    public ?string $shipToState;

    #[MapFrom('ship_to_state_code')]
    #[MapTo('ship_to_state_code')]
    public ?string $shipToStateCode;

    #[MapFrom('ship_to_postal_code')]
    #[MapTo('ship_to_postal_code')]
    public ?string $shipToPostalCode;

    #[MapFrom('ship_to_country')]
    #[MapTo('ship_to_country')]
    public ?string $shipToCountry;

    #[MapFrom('ship_to_country_code')]
    #[MapTo('ship_to_country_code')]
    public ?string $shipToCountryCode;

    #[MapFrom('ship_to_email')]
    #[MapTo('ship_to_email')]
    public ?string $shipToEmail;

    #[MapFrom('ship_to_phone')]
    #[MapTo('ship_to_phone')]
    public ?string $shipToPhone;

    #[MapFrom('shipper_number')]
    #[MapTo('shipper_number')]
    public ?string $shipperNumber;

    #[MapFrom('shipping_method')]
    #[MapTo('shipping_method')]
    public ?string $shippingMethod;

    #[MapFrom('shipping_method_code')]
    #[MapTo('shipping_method_code')]
    public ?string $shippingMethodCode;
}
