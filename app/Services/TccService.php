<?php

namespace App\Services;

use App\Traits\ConsumeExternalServices;

class TccService
{
    use ConsumeExternalServices;

    /**
     * The url from which send the requests
     * @var string
     */
    protected $baseUri;

    public function __construct()
    {
        $this->baseUri = config('services.tcc.base_uri');
    }

    /**
     * Resolves the elements to send when authorizing the request
     * @param array &$queryParams
     * @param array &$formParams
     * @param array &$headers
     * @return void
     */
    public function resolveAuthorization(&$queryParams, &$formParams, &$headers)
    {
        $accessToken = $this->resolveAccessToken();

        $headers['Authorization'] = $accessToken;
    }

    /**
     * Decode the response
     * @param array $response
     * @return stdClass
     */
    public function decodeResponse($response)
    {
        //
    }

    /**
     * Resolve if the request to the service failed
     * @param array $response
     * @return void
     */
    public function checkIfErrorResponse($response)
    {
        //
    }

    public function resolveAccessToken()
    {
        return 'Bearer ';
    }

}
