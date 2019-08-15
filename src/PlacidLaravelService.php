<?php

namespace Placid\Laravel;

use Placid\Template;

class PlacidLaravelService
{
    private $apiToken;
    private $webhook_url;

    public function __construct($apiToken, $webhook_url)
    {
        $this->apiToken = $apiToken;
        $this->webhook_url = $webhook_url;
    }

    public function template(string $template_uuid): Template
    {
        $template = new Template($template_uuid, $this->apiToken);

        if ($this->webhook_url) {
            $template->successWebhook($this->webhook_url);
        }

        return $template;
    }
}
