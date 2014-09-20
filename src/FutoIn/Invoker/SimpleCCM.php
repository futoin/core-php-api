<?php
/**
 * Simple FutoIn Connection and Credentials Manager
 *
 * @package FutoIn\Core\PHP\API
 * @copyright 2014 FutoIn Project (http://futoin.org)
 * @author Andrey Galkin
 */

namespace FutoIn\Invoker;

/**
 * Simple FutoIn Connection and Credentials Manager (CCM), based on "FTN6: FutoIn Invoker Concept" v1.0
 *
 * @see http://specs.futoin.org/final/preview/ftn7_iface_invoker_concept-1.html
 * @api
 */
interface SimpleCCM
{
    const SVC_RESOVLER = '#resolver';
    const SVC_AUTH = '#auth';
    const SVC_DEFENSE = '#defense';
    const SVC_ACL = '#acl';
    const SVC_LOG = '#log';

    /**
     * Register FutoIn interface for later use.
     *
     * Note: actual registration happens only when AsyncSteps executes
     *
     * @param \FutoIn\AsyncSteps $as AsyncSteps object
     * @param string $name Arbitrary interface name. It is strongly recommended to be prefixed with using component name
     * @param string $ifacever As defined in the spec
     * @param string endpoint As defined in the spec (URI or any other meaningful designator)
     * @param mixed $credentials For low security authentication (non-MasterService)
     */
    public function register( \FutoIn\AsyncSteps $as, $name, $ifacever, $endpoint, $credentials=null );
    
    /**
     * Get previously registered interface by name
     * @param string $name Arbitrary interface name.
     * @return Native interface for FutoIn interface
     */
    public function iface( $name );
    
    /**
     * Unregister previously registered interface
     * @param string $name Arbitrary interface name.
     * @return void
     */
    public function unRegister( $name );
    
    /**
     * Shortcut for iface( "#defense" )
     * @return Advanced Native Defense system interface
     */
    public function defense();
    
    /**
     * Shortcut for iface( "#log" )
     * @return Advanced Native Log system interface (FTN3)
     */
    public function log();
    
    /**
     * Get Burst Control (FTN10) interface
     * @return Advanced Native Defense system interface
     */
    public function burst();
    
    /**
     * Assert that interface registered under $name matches
     * FutoIn interface identifier $ifacever, major version and minor version is 
     * greater or equal to $ifacever
     */
    public function assertIface( $name, $ifacever );
    
    /**
     * Make $alias an alias for $name registration.
     */
    public function alias( $name, $alias );
}
