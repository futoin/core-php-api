<?php
/**
 * Simple FutoIn Connection and Credentials Manager
 *
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
    
    /**
     * @event 'register' ( name, ifacever, rawinfo ) - when new interface get registered
     * @event 'unregister' ( name, rawinfo ) - when interface get unregistered
     * @event 'close' - when CCM is shutdown
     */

    /** Runtime iface resolution v1.x */
    const SVC_RESOVLER = '#resolver';
    /** AuthService v1.x */
    const SVC_AUTH = '#auth';
    /** Defense system v1.x */
    const SVC_DEFENSE = '#defense';
    /** Access Control system v1.x */
    const SVC_ACL = '#acl';
    /** Audit Logging v1.x */
    const SVC_LOG = '#log';
    /** Cache v1.x prefix */
    const SVC_CACHE_ = '#cache.';

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
     * @param array $options optional, override global options of CCM
     */
    public function register( \FutoIn\AsyncSteps $as, $name, $ifacever, $endpoint, $credentials=null, $options=null );
    
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
     * Get Cache (FTN14) interface
     * @param Arbitrary cache bucket
     * @return Advanced Native Cache system interface
     */
    public function cache( $bucket = 'default' );
    
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

    /**
     * Shutdown CCM processing
     */
    public function close();
}
