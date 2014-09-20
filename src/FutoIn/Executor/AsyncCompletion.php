<?php
/**
 * FutoIn Executor Async Completion
 *
 * @package FutoIn\Core\PHP\API
 * @copyright 2014 FutoIn Project (http://futoin.org)
 * @author Andrey Galkin
 */

namespace FutoIn\Executor;

/**
 * FutoIn Executor Async Completion
 *
 * @see http://specs.futoin.org/final/preview/ftn6_iface_executor_concept-1.html
 * @api
 */
interface AsyncCompletion extends \FutoIn\AsyncSteps
{
    /**
     * Get request info
     * @return \FutoIn\Executor\RequestInfo
     */
    public function reqinfo();
}