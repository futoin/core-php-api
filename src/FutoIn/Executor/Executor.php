<?php
/**
 * FutoIn Executor
 *
 * @copyright 2014 FutoIn Project (http://futoin.org)
 * @author Andrey Galkin
 */

namespace FutoIn\Executor;

/**
 * FutoIn Executor
 *
 * @see http://specs.futoin.org/final/preview/ftn6_iface_executor_concept-1.html
 * @api
 */
interface Executor {
    /**
     * Get associated Connection and Credential manager
     * @return \FutoIn\Invoker\AdvancedCCM
     */
    public function ccm();
    
    /**
     * Register implementation of specific FutoIn interface with specific version
     * @param string $ifacever "iface:version" pair as per the spec
     * @param string|InterfaceImplementation $impl Either class name for lazy loading or already instantiated object
     * @return void
     */
    public function register( \FutoIn\AsyncSteps $as, $ifacever, $impl );
    
    /**
     * Process request, received for arbitrary channel, including unit-test generated
     * @param $as - AsyncSteps interface
     * @return void
     */
    public function process( \FutoIn\AsyncSteps $as );
    
    /**
     * Entry point for Server-originated requests
     * @param array info - internal CCM interface info
     * @param object ftnreq - incoming FutoIn request object
     * @param Callable send_executor_rsp( rsp ) - callback to send response
     */
    public function onEndpointRequest( $info, $ftnreq, $send_executor_rsp );
    
    /**
     * Entry point for in-program originated requests. Process with maximum efficiency
     * @param $as - AsyncSteps interface
     * @param array info - internal CCM interface info
     * @param object ftnreq - incoming FutoIn request object
     */
    public function onInternalRequest( $as, $info, $ftnreq );

    /**
     * A shortcut to check access through #acl interface
     * @param $as - AsyncSteps interface
     * @param $acd - Access Control Descriptor
     * @return void
     */
    public function checkAccess( \FutoIn\AsyncSteps $as, array $acd );
    
    /**
     * initialized from cache (no need to register interfaces)
     * @param $as AsyncSteps instance
     */
    public function initFromCache( \FutoIn\AsyncSteps $as );
    
    /**
     * Call after all registrations are done to cache them
     * @param $as AsyncSteps instance
     */
    public function cacheInit( \FutoIn\AsyncSteps $as );
}
