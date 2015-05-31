<?php
/**
 * FutoIn Executor Source Address
 *
 * @copyright 2014 FutoIn Project (http://futoin.org)
 * @author Andrey Galkin
 */

namespace FutoIn\Executor;

/**
 * FutoIn Executor Source Address
 *
 * @see http://specs.futoin.org/final/preview/ftn6_iface_executor_concept-1.html
 * @api
 */
interface SourceAddress {
    const TYPE_IPv4 = "IPv4";
    const TYPE_IPv6 = "IPv6";
    const TYPE_LOCAL = "LOCAL";

    /**
     * @return numeric address, no name lookup
     */
    public function host();
    
    /**
     * @return port or local path/identifier
     */
    public function port();
    
    /**
     * @return Type of address
     */
    public function type();
    
    /**
     * @return "Type:Host:Port" or "Type:Port"
     */
    public function asString();
}
