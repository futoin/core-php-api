<?php
/**
 * Advanced FutoIn Connection and Credentials Manager
 *
 * @copyright 2014 FutoIn Project (http://futoin.org)
 * @author Andrey Galkin
 */


namespace FutoIn\Invoker;

/**
 * Advanced FutoIn Connection and Credentials Manager
 * 
 * NOTE: There is no difference in interface, but different type
 * allows user to clear distinguish if Advanced CCM is required.
 *
 * @see http://specs.futoin.org/final/preview/ftn7_iface_invoker_concept-1.html
 * @api
 */
interface AdvancedCCM extends SimpleCCM
{
    /**
     * initialized from cache (no need to register interfaces)
     * @param $as AsyncSteps instance
     * @param $cache_l1_endpoint endpoint URL to Cache L1 service
     */
    public function initFromCache( \FutoIn\AsyncSteps $as, $cache_l1_endpoint );
    
    /**
     * Call after all registrations are done to cache them
     * @param $as AsyncSteps instance
     */
    public function cacheInit( \FutoIn\AsyncSteps $as );
}
