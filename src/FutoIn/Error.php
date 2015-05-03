<?php
/**
 * FutoIn Error definition
 *
 * @copyright 2014 FutoIn Project (http://futoin.org)
 * @author Andrey Galkin
 */


namespace FutoIn;

/**
 * FutoIn exception class
 *
 * @api
 */
class Error extends \Exception
{
    /**
     * Connection error before request is sent.
     * Must be generated on Invoker side
     */
    const ConnectError = "ConnectError";
    
    /**
     * Communication error at any stage after request is sent
     * and before response is received.
     * Must be generated on Invoker side
     */
    const CommError = "CommError";
    
    /**
     * Unknown interface requested.
     * Must be generated only on Executor side
     */
    const UnknownInterface = "UnknownInterface";

    /**
     * Not supported interface version.
     * Must be generated only on Executor side
     */
    const NotSupportedVersion = "NotSupportedVersion";

    /**
     * In case interface function is not implemented on Executor side
     * Must be generated on Executor side
     */
    const NotImplemented = "NotImplemented";

    /**
     * Security policy on Executor side does not allow to
     * access interface or specific function.
     * Must be generated only on Executor side
     */
    const Unauthorized = "Unauthorized";

    /**
     * Unexpected internal error on Executor side, including internal CommError.
     * Must be generated only on Executor side
     */
    const InternalError = "InternalError";

    /**
     * Unexpected internal error on Invoker side, not related to CommError.
     * Must be generated only on Invoker side
     */
    const InvokerError = "InvokerError";

    /**
     * Invalid data is passed as FutoIn request.
     * Must be generated only on Executor side
     */
    const InvalidRequest = "InvalidRequest";

    /**
     * Defense system has triggered rejection
     * Must be generated on Executor side, but also possible to be triggered on Invoker
     */
    const DefenseRejected = "DefenseRejected";

    /**
     * Executor requests re-authorization
     * Must be generated only on Executor side
     */
    const PleaseReauth = "PleaseReauth";

    /**
     * 'sec' request section has invalid data or not SecureChannel
     * Must be generated only on Executor side
     */
    const SecurityError = "SecurityError";

    /**
     * Timeout occurred in any stage
     * Must be used only internally and should never travel in request message
     */
    const Timeout = "Timeout";

    /**
     * Loop Break called
     * Must not be used directly.
     */
    const LoopBreak = "LoopBreak";

    /**
     * Loop Continue called
     * Must not be used directly.
     */
    const LoopCont = "LoopCont";
}