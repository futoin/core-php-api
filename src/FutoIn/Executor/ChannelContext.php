<?php
/**
 * FutoIn Communication Channel Context
 *
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
     * Register interface as implemented by client peer
     * @param string $ifacever "iface:version" pair as per the spec
     * @param array $options options to pass to AdvancedCCM.register()
     * @return void
     */
    public function register( \FutoIn\AsyncSteps $as, $ifacever, $options );
    
    /**
     * Get native interface wrapper for invocation of iface methods on client peer
     * @param string $ifacever "iface:version" pair as per the spec
     * @return Native interface for FutoIn interface
     */
    public function iface( $ifacever );

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
