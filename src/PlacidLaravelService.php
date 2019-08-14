<?php

namespace Placid\Laravel;

class PlacidLaravelService
{
    private $apiToken;
    private $webhook_url;

    public function __construct($apiToken, $webhook_url)
    {
        $this->apiToken = $apiToken;
        $this->webhook_url = $webhook_url;
    }
}
