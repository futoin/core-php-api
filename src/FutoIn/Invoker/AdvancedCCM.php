<?php
/**
 * Advanced FutoIn Connection and Credentials Manager
 *
 * @package FutoIn\Core\PHP\API
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
}
