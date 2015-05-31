<?php
/**
 * FutoIn AsyncSteps interface definition
 *
 * @copyright 2014 FutoIn Project (http://futoin.org)
 * @author Andrey Galkin
 */
 

namespace FutoIn;

/**
 * AsyncSteps interface as per "FTN12: FutoIn Async API" v1.1
 *
 * @see http://specs.futoin.org/final/preview/ftn12_async_api.html
 * @api
 */
interface AsyncSteps
{
    /**
     * Add $func step executor to end of current AsyncSteps level queue
     *
     * @param callable $func void execute_callback( AsyncSteps as[, previous_success_args] )
     * @param callable $onerror OPTIONAL: void error_callback( AsyncSteps as, error )
     * @return reference to $this
     */
    public function add( callable $func, callable $onerror=null );
    
    /**
     * Create special object to queue steps for execution in parallel
     
     * @param callable $onerror OPTIONAL: void error_callback( AsyncSteps as, error )
     * @return Special parallel interface, identical to AsyncSteps
     * \note Please see the specification for more information
     *
     * All steps added through returned parallel object are seen as a single step
     */
    public function parallel( callable $onerror=null );
    
    /**
     * Set "success" state of current step execution
     *
     * \note Please see the specification for constraints
     * @param ... Any passed argument is used as input for the next step
     */
    public function success( /* results */ );
  
    /**
     * Call success() or add sub-step with success() depending on presence of other sub-steps
     * @deprecated
     */
    public function successStep();
    
    /**
     * PHP-specific alias for success()
     */
    public function __invoke( /* results */ );
    
    /**
     * Set "error" state of current step execution
     *
     * @param string $name Type of error
     * @param string $error_info Optional. Error info
     * \note Please see the specification for constraints
     * \see \FutoIn\Error
     */
    public function error( $name, $error_info=null );
    
    /**
     * Access AsyncSteps state object
     *
     * @return State object
     */
    public function state();
    
    /**
     * Delay further execution until success() or error() is called
     *
     * @param int $timeout_ms Timeout in milliseconds
     * \note Please see the specification
     */
    public function setTimeout( $timeout_ms );
    
    /**
     * Set cancellation callback
     *
     * @param callable $oncancel void cancel_callback( AsyncSteps as )
     * \note Please see the specification
     */
    public function setCancel( callable $oncancel );
    
    /**
     * Start execution of AsyncSteps
     */
    public function execute();
    
    /**
     * Copy steps from other AsyncSteps, useful for sub-step cloning
     *
     * @param AsyncSteps $other Object to copy from
     * @return reference to $this
     * \note Please see the specification for more information
     */
    public function copyFrom( AsyncSteps $other );
    
    /**
     * PHP-specific: properly copy internal structures after cloning of AsyncSteps
     */
    public function __clone();

    /**
     * state() access through AsyncSteps interface / set value
     * @param $name State variable name
     * @param $value State variable value
     */
    public function __set( $name, $value );
    
    /**
     * state() access through AsyncSteps interface / get value
     * @param $name State variable name
     */
    public function &__get( $name );
    
    /**
     * state() access through AsyncSteps interface / check value
     * @param $name State variable name
     */
    public function __isset( $name );
    
    /**
     * state() access through AsyncSteps interface / delete value
     * @param $name State variable name
     */
    public function __unset( $name );
    
    /**
     * Execute loop until *as.break()* is called
     * @param callable $func loop body callable( as )
     * @param string $label optional label to use for *as.break()* and *as.continue()* in inner loops
     */
    public function loop( callable $func, $label = null );
    
    /**
     * For each *map* or *list* element call *func( as, key, value )*
     * @param array $maplist
     * @param callable $func loop body *func( as, key, value )*
     * @param string $label optional label to use for *as.break()* and *as.continue()* in inner loops
     */
    public function loopForEach( $maplist, callable $func, $label = null );
    
    /**
     * Call *func(as, i)* for *count* times
     * @param integer $count how many times to call the *func*
     * @param callable $func loop body *func( as, key, value )*
     * @param string $label optional label to use for *as.break()* and *as.continue()* in inner loops
     */
    public function repeat( $count, callable $func, $label = null );

    /**
     * Break execution of current loop, throws exception
     * @param string $label unwind loops, until *label* named loop is exited
     */
    public function breakLoop( $label = null );

    /**
     * Ccontinue loop execution from the next iteration, throws exception
     * @param string $label break loops, until *label* named loop is found
     */
    public function continueLoop( $label = null );
}
