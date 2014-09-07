<?php

namespace FutoIn;

/**
 * \brief AsyncSteps interface as per "FTN12: FutoIn Async API" v1.1
 *
 * \sa http://specs.futoin.org/final/preview/ftn12_async_api.html
 */
interface AsyncSteps
{
    /**
     * \brief Add \$func step executor to end of current AsyncSteps level queue
     * \param $func void execute_callback( AsyncSteps as[, previous_success_args] )
     * \param $onerror OPTIONAL: void error_callback( AsyncSteps as, error )
     * \return reference to $this
     */
    public function add( callable $func, callable $onerror=null );
    
    /**
     * \brief Create special object to queue steps for execution in parallel
     * \param $onerror OPTIONAL: void error_callback( AsyncSteps as, error )
     * \return Special parallel interface, identical to AsyncSteps
     * \note Please see the specification for more information
     *
     * All steps added through returned parallel object are seen as a single step
     */
    public function parallel( callable $onerror=null );
    
    /**
     * \brief Set "success" state of current step execution
     * \note Please see the specification for constraints
     * \param ... Any passed argument is used as input for the next step
     */
    public function success( /* results */ );
    
    /**
     * \brief PHP-specific alias for success()
     */
    public function __invoke( /* results */ );
    
    /**
     * \brief Set "error" state of current step execution
     * \param $name Type of error
     * \note Please see the specification for constraints
     * \see \FutoIn\Error
     */
    public function error( $name );
    
    /**
     * \brief Access AsyncSteps state object
     * \return State object
     */
    public function state();
    
    /**
     * \brief Delay further execution until success() or error() is called
     * \param $timeout_ms Timeout in milliseconds
     * \note Please see the specification
     */
    public function setTimeout( $timeout_ms );
    
    /**
     * \brief Set cancellation callback
     * \param $oncancel void cancel_callback( AsyncSteps as )
     * \note Please see the specification
     */
    public function setCancel( callable $oncancel );
    
    /**
     * \brief Start execution of AsyncSteps
     */
    public function execute();
    
    /**
     * \brief Copy steps from other AsyncSteps, useful for sub-step cloning
     * \return reference to $this
     * \note Please see the specification for more information
     */
    public function copyFrom( AsyncSteps $other );
    
    /**
     * \brief PHP-specific: properly copy internal structures after cloning of AsyncSteps
     */
    public function __clone();

    /**
     * \brief state() access through AsyncSteps interface / set value
     */
    public function __set( $name, $value );
    
    /**
     * \brief state() access through AsyncSteps interface / get value
     */
    public function &__get( $name );
    
    /**
     * \brief state() access through AsyncSteps interface / check value
     */
    public function __isset( $name );
    
    /**
     * \brief state() access through AsyncSteps interface / delete value
     */
    public function __unset( $name );
}
