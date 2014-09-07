<?php

namespace FutoIn;

/**
 * \brief FutoIn exception class
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