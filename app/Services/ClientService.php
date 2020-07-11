<?php

namespace App\Services;

use App\Traits\ClientApi;
use App\Traits\ClientApiResponse;

class ClientService
{
    use ClientApi, ClientApiResponse;

    protected $ApiUrl;

    public function __construct()
    {
        $this->ApiUrl = config('services.service.apiurl');
    }

    public function Get()
    {
        return $this->Request('GET');
    }

}