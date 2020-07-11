<?php

namespace App\Traits;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Exception\ServerException;
use GuzzleHttp\Exception\BadResponseException;

trait ClientApi
{
    public function Request($Method, $Url='')
    {
        try {
            $Client = new Client([
                'base_uri' => $this->ApiUrl,
            ]);
            $Response = $Client->request($Method, $Url);
            if (method_exists($this, 'decode')) {
                $Response = $this->decode($Response);
            }
        } catch (ClientException $e) {
            $Response = $e->getResponse();
            if (method_exists($this, 'ExistError')) {
                $Response = $this->ExistError($Response);
            }
        } catch (ServerException $e) {
            $Response = $e->getResponse();
            if (method_exists($this, 'ExistError')) {
                $Response = $this->ExistError($Response);
            }
        } catch (BadResponseException $e) {
            $Response = $e->getResponse();
            if (method_exists($this, 'ExistError')) {
                $Response = $this->ExistError($Response);
            }
        }         
        return $Response;
    }
}