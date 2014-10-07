<?php
/**
 * FutoIn Communication Channel Context
 *
 * @package FutoIn\Core\PHP\API
 * @copyright 2014 FutoIn Project (http://futoin.org)
 * @author Andrey Galkin
 */

namespace FutoIn\Executor;

/**
 * FutoIn Communication Channel Context
 *
 * @see http://specs.futoin.org/final/preview/ftn6_iface_executor_concept-1.html
 * @api
 */
interface ChannelContext
{
    const TYPE_HTTP = "HTTP";
    const TYPE_LOCAL = "LOCAL";
    const TYPE_TCP = "TCP";
    const TYPE_UDP = "UDP";

    /**
     * Get type of channel
     * HTTP
     * LOCAL
     * TCP
     * UDP
     * any other - as non-standard extension
     * @return string type identifier
     */
    public function type();
    
    /**
     * Check if current communication channel between Invoker and Executor is stateful
     * @return boolean
     */
    public function isStateful();
    
    /**
     * Get channel state variables
     * @note state is persistent only for stateful protocols
     * @return array of key-value pairs
     */
    public function state();

    /**
     * state() access through ChannelContext interface / set value
     * @param $name State variable name
     * @param $value State variable value
     */
    public function __set( $name, $value );
    
    /**
     * state() access through ChannelContext interface / get value
     * @param $name State variable name
     */
    public function &__get( $name );
    
    /**
     * state() access through ChannelContext interface / check value
     * @param $name State variable name
     */
    public function __isset( $name );
    
    /**
     * state() access through ChannelContext interface / delete value
     * @param $name State variable name
     */
    public function __unset( $name );
}
