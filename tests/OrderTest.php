<?php

use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Psr7\Response;
use Pdfsystems\ShippingIntegrationSdk\Dtos\Order;
use Pdfsystems\ShippingIntegrationSdk\Enums\OrderType;
use Pdfsystems\ShippingIntegrationSdk\ShippingSdkClient;

it('can load create orders', function () {
    $data = [
        'id' => 1,
        'source_application' => 1,
        'order_type' => 1,
        'order_id' => '1234',
        'order_number' => '10000-0',
        'ship_to_name' => 'John Doe',
        'ship_to_street' => '123 Fake St',
    ];
    $mock = new MockHandler([
        new Response(200, ['content-type' => 'application/json'], json_encode($data)),
    ]);
    $client = new ShippingSdkClient('test', 'test', 'https://example.com', HandlerStack::create($mock));
    $order = $client->submitOrder(new Order($data));
    expect($order)->toBeInstanceOf(Order::class)
        ->and($order->id)->toBe(1)
        ->and($order->sourceApplication)->toBe(1)
        ->and($order->orderType)->toBe(OrderType::SalesOrder)
        ->and($order->orderId)->toBe('1234')
        ->and($order->orderNumber)->toBe('10000-0')
        ->and($order->shipToName)->toBe('John Doe')
        ->and($order->shipToStreet)->toBe('123 Fake St');
});
