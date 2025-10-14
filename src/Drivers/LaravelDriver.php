<?php

namespace Pdfsystems\ShippingIntegrationSdk\Drivers;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Http\Client\PendingRequest;

class LaravelDriver extends \Rpungello\SdkClient\Drivers\LaravelDriver
{
    public function __construct(Application $app, private readonly string $tenantId, private readonly string $authToken, string $baseUri = 'https://shipping.pdfsystems.com')
    {
        parent::__construct($app, "$baseUri/$this->tenantId/api/");
    }

    protected function pendingRequest(array $headers = []): PendingRequest
    {
        return parent::pendingRequest($headers)
            ->withToken($this->authToken);
    }
}
