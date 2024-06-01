<?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Exception;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;

class AuthFilter implements FilterInterface
{
    /**
     * Do whatever processing this filter needs to do.
     * By default it should not return anything during
     * normal execution. However, when an abnormal state
     * is found, it should return an instance of
     * CodeIgniter\HTTP\Response. If it does, script
     * execution will end and that Response will be
     * sent back to the client, allowing for error pages,
     * redirects, etc.
     *
     * @param RequestInterface $request
     * @param array|null       $arguments
     *
     * @return RequestInterface|ResponseInterface|string|void
     */
    public function before(RequestInterface $request, $arguments = null)
    {
        try {
            
            // Get the API key from the headers
            $token = $request->getHeaderLine('X-API-KEY');
            $key = getenv('API_KEYS');

            // Check if API key exists
            if (empty($token)) {
                // API key is missing
                $response = service('response');
                $response->setBody('Please input api keys');
                $response->setStatusCode(401);
                return $response;
            }

            if ($token !== $key){

                $response = service('response');
                $response->setBody('Invalid api keys');
                $response->setStatusCode(400);
                return $response;
            }



        } catch (Exception $ex) {
            // Exception occurred
            $response = service('response');
            $response->setBody($ex->getMessage());
            $response->setStatusCode($ex->getCode());
            return $response;
        }
    }

    /**
     * Allows After filters to inspect and modify the response
     * object as needed. This method does not allow any way
     * to stop execution of other after filters, short of
     * throwing an Exception or Error.
     *
     * @param RequestInterface  $request
     * @param ResponseInterface $response
     * @param array|null        $arguments
     *
     * @return ResponseInterface|void
     */
    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
       
    }
}
