<?php
/**
 * FutoIn Error definition
 *
 * @package FutoIn\Core\PHP\API
 * @copyright 2014 FutoIn Project (http://futoin.org)
 * @author Andrey Galkin
 */


namespace FutoIn;

/**
 * FutoIn exception class
 *
 * @api
 *
 * \warning It specification is not final yet
 */
class Error extends \Exception
{
    const ConnectError = "ConnectError";
    const CommError = "CommError";
    const NotImplemented = "NotImplemented";
    const Unauthorized = "Unauthorized";
    const InternalError = "InternalError";
    const InvokerError = "InvokerError";
    const UnknownInterface = "UnknownInterface";
    const NotSupportedVersion = "NotSupportedVersion";
    const InvalidRequest = "InvalidRequest";
    const SecurityError = "SecurityError";
    const Timeout = "Timeout";
}