<?php
/**
 * Derived Key Accessor wrapper
 *
 * @copyright 2014 FutoIn Project (http://futoin.org)
 * @author Andrey Galkin
 */

namespace FutoIn\Invoker;

/**
 * Invoker interface wrapper to make sure that correct
 * Derived key is used for calls
 *
 * @see http://specs.futoin.org/final/preview/ftn7_iface_invoker_concept-1.html 
 * @warning Object implementing this interfaces becomes invalid after call is made
 * @api
 */
interface DerivedKeyAccessor
{
    /**
     * Get Derived Key to be used for the following call
     * @return DerivedKey, valid only until next call
     */
    public function derivedKey();
    
    /**
     * Proxy call to NativeInterface method
     * @return anything that NativeInterface returns
     */
    public function __call( $name, $args );
}
