<?php
/**
 * FutoIn Native Interface for Invocation
 *
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
    public function call( \FutoIn\AsyncSteps $as, $name, $params, $upload_data=null, $download_stream=null, $timeout=null );
    
    /**
     * Get interface info
     * @return \FutoIn\InterfaceInfo
     */
    public function ifaceInfo();
    
    /**
     * Get FTN10 Burst Call interface
     * @return BurstControl interface
     */
    public function burst();
    
    /**
     * Get iface wrapper with derived key accessor
     * @return \FutoIn\Invoker\DerivedKeyAccessor
     */
    public function bindDerivedKey( \FutoIn\AsyncSteps $as );
}