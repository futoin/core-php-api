<?php
/**
 * FutoIn HTTP Communication Channel Context
 *
 * @copyright 2014 FutoIn Project (http://futoin.org)
 * @author Andrey Galkin
 */

namespace FutoIn\Executor;

/**
 * FutoIn HTTP Communication Channel Context
 *
 * @see http://specs.futoin.org/final/preview/ftn5_iface_http_integration-1.html
 * @api
 */
interface HTTPChannelContext
    extends ChannelContext
{
    /**
     * Get all request headers as map
     * @return array of name->value pairs
     */
    public function getRequestHeaders();
    
    /**
     * @param $name Header name
     * @param $value Header value
     * @param $override Override previous headers with the same name
     * @return void
     */
    public function setResponseHeader( $name, $value, $override=true );
    
    /**
     * Set HTTP status code
     * @param $http_code HTTP status code
     * @param $desc Description. If null then standard from the HTTP/1.1 specification is used
     * @return void
     */
    public function setStatusCode( $http_code );
    
    /**
     * Set cookie value
     * @param $name Cookie name
     * @return cookie value
     */
    public function getCookie( $name );
    
    /**
     * Set cookie
     * @param $name Cookie name
     * @param $value Cookie value
     * @param $options array|object with the following fields:
     *      options.http_only = true 
     *      options.secure = INFO_SECURE_CHANNEL
     *      options.domain = null
     *      options.path = null
     *      options.expires = null (date object or string)
     *      options.max_age = null (interval object or string)
     * @return void
     */
    public function setCookie( $name, $value, $options );
}
