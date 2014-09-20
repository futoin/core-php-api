<?php
/**
 * FutoIn Executor
 *
 * @package FutoIn\Core\PHP\API
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
    public function register( $ifacever, $impl );
    
    /**
     * Process request, received for arbitrary channel, including unit-test generated
     * @param $async_completion - asynchronous completion interface
     * @return void
     */
    public function process( \FutoIn\Executor\AsyncCompletion $async_completion );
    
    /**
     * A shortcut to check access through #acl interface
     * @param $async_completion - asynchronous completion interface
     * @param $acd - Access Control Descriptor
     * @return void
     */
    public function checkAccess( \FutoIn\Executor\AsyncCompletion $async_completion, array $acd );
}
