<?php

use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Psr7\Response;
use Pdfsystems\ShippingIntegrationSdk\Dtos\Order;
use Pdfsystems\ShippingIntegrationSdk\Dtos\Tracking;
use Pdfsystems\ShippingIntegrationSdk\ShippingSdkClient;

it('can load tracking numbers', function () {
    $data = [
        [
            'id' => 1,
            'order' => [
                'id' => 1,
                'source_application' => 1,
                'order_type' => 1,
                'order_id' => 1234,
                'order_number' => '10000-0',
                'ship_to_name' => 'John Doe',
                'ship_to_street' => '123 Fake St',
            ],
            'tracking_number' => '1234567890',
        ]];
    $mock = new MockHandler([
        new Response(200, ['content-type' => 'application/json'], json_encode($data)),
    ]);
    $client = new ShippingSdkClient('test', 'test', 'https://example.com', HandlerStack::create($mock));
    $tracking = $client->getTrackingNumbers();
    expect($tracking)->toBeArray();
    expect($tracking)->toHaveCount(1);
    expect($tracking[0])->toBeInstanceOf(Tracking::class);
    expect($tracking[0]->id)->toBe(1);
    expect($tracking[0]->trackingNumber)->toBe('1234567890');
    expect($tracking[0]->order)->toBeInstanceOf(Order::class);
});
