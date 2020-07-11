<?php 

namespace App\Traits;

trait ClientApiResponse
{
    public function decode($response)
    {
        if (strpos($response->getHeader('content-type')[0], 'application/json') === false) {
            return $response->getBody()->getContents();
        } else {
            $decodedResponse = json_decode($response);
            return $decodedResponse->data ?? $decodedResponse;
        }
    }

    public function CodeError($Code) 
    {
        switch($Code) {
            case 200: return "Everything is OK.";
            case 301: return "The requested resource has been moved permanently.";
            case 302: return "The requested resource has moved, but was found.";
            case 304: return "The requested resource has not been modified since the last time you accessed it.";
            case 401: return "Authorization Required.";
            case 403: return "Access to that resource is forbidden.";
            case 404: return "The requested resource was not found.";
            case 405: return "Method not allowed.";
            case 406: return "Not acceptable response.";
            case 408: return "The server timed out waiting for the rest of the request from the browser.";
            case 410: return "The requested resource is gone and won’t be coming back.";
            case 429: return "Too many requests.";
            case 499: return "Client closed request.";
            case 500: return "There was an error on the server and the request could not be completed.";
            case 501: return "Not Implemented.";
            case 502: return "Bad Gateway.";
            case 503: return "The server is unavailable to handle this request right now.";
            case 504: return "The server, acting as a gateway, timed out waiting for another server to respond.";
            case 521: return "Web server is down";
            case 522: return "No options in response";
            default: return "General Error";
        }
    }

    public function ExistError($Response)
    {
        if (($Response->getStatusCode() != null)) {
            return $this->CodeError($Response->getStatusCode());
        }
        return $Response;
    }
}