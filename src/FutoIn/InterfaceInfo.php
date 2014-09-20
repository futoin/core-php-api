<?php
/**
 * FutoIn Interface Info
 *
 * @package FutoIn\Core\PHP\API
 * @copyright 2014 FutoIn Project (http://futoin.org)
 * @author Andrey Galkin
 */


namespace FutoIn;

/**
 * FutoIn Interface Information
 */
interface InterfaceInfo
{
    /**
     * Get interface identifier
     */
    public function name();
    
    /**
     * Get interface version
     */
    public function version();
    
    /**
     * Get list of inheritted interface name-versions starting with the most derived
     */
    public function inherits();
    
    /**
     * Get list of defined functions as map name =>> { params => ..., result => ..., throws => ... )
     */
    public function funcs();
    
    /**
     * Get interface constraint list
     */
    public function constraints();
}
