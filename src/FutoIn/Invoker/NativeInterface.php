<?php
/**
 * FutoIn Native Interface for Invocation
 *
 * @package FutoIn\Core\PHP\API
 * @copyright 2014 FutoIn Project (http://futoin.org)
 * @author Andrey Galkin
 */


namespace FutoIn\Invoker;

/**
 * FutoIn Native Interface for Invocation of FutoIn interface
 * @see http://specs.futoin.org/final/preview/ftn7_iface_invoker_concept-1.html
 * @api
 */
interface NativeInterface
{
    /**
     * Call FutoIn interface function.
     * Result is passed through AsyncSteps.success( result )
     *
     * @param AsyncSteps $as AsyncSteps object
     * @param $name function to call
     * @param map $params Parameters to pass to Executor
     * @return void
     */
    public function call( \FutoIn\AsyncSteps $as, $name, $params );
    
    /**
     * Get interface info
     * @return \FutoIn\InterfaceInfo
     */
    public function iface();
    
    /**
     * Call FutoIn interface function with file stream to upload.
     * Result is passed through AsyncSteps.success( result )
     *
     * @param AsyncSteps $as AsyncSteps object
     * @param map $params Parameters to pass to Executor
     * @return void
     */
    public function callData( \FutoIn\AsyncSteps $as, $name, $params, array $upload_data );
    
    /**
     * Get FTN10 Burst Call interface
     * @return BurstControl interface
     */
    public function burst();
    
    /**
     * PHP-specific call operator overloading
     *
     * @param $name function to call (automatically passed)
     * @param $args [0] - AsyncSteps [1] - $params
     * @return void
     */
    public function __call( $name, $args );
}