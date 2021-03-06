<?php
/**
 * FutoIn Executor Request Info
 *
 * @copyright 2014 FutoIn Project (http://futoin.org)
 * @author Andrey Galkin
 */

namespace FutoIn\Executor;

/**
 * FutoIn Executor Request Info
 *
 * @see http://specs.futoin.org/final/preview/ftn6_iface_executor_concept-1.html
 * @api
 */
interface RequestInfo {
    /** validated x509 certificate CN field */
    const INFO_X509_CN = "X509_CN";
    /** public key, if present */
    const INFO_PUBKEY = "PUBKEY";
    /** SourceAddress object of request external to current system
        (e.g. without *trusted* reverse proxies, gateways, etc.) */
    const INFO_CLIENT_ADDR = "CLIENT_ADDR";
    /** boolean - is request coming through secure channel? */
    const INFO_SECURE_CHANNEL = "SECURE_CHANNEL";
    /** platform-specific timestamp of request processing start */
    const INFO_REQUEST_TIME_FLOAT = "REQUEST_TIME_FLOAT";
    /** one of pre-defined security levels (auth levels) of current processing */
    const INFO_SECURITY_LEVEL = "SECURITY_LEVEL";
    /** user information object */
    const INFO_USER_INFO = "USER_INFO";
    /**  raw request object */
    const INFO_RAW_REQUEST = "RAW_REQUEST";
    /** raw response object */
    const INFO_RAW_RESPONSE = "RAW_RESPONSE";
    /** derived key object */
    const INFO_DERIVED_KEY = "DERIVED_KEY";
    /** have raw upload (e.g. can open rawInput()) */
    const INFO_HAVE_RAW_UPLOAD = "HAVE_RAW_UPLOAD";
    /** have raw result (e.g. should open rawOutput()) */
    const INFO_HAVE_RAW_RESULT = "HAVE_RAW_RESULT";
    /** ChannelContext instance - communication channel context */
    const INFO_CHANNEL_CONTEXT = "CHANNEL_CONTEXT";

    /** Security Levels - no authenticated */
    const SL_ANONYMOUS = "Anonymous";
    /** Security Levels - read-only authentication */
    const SL_INFO = "Info";
    /** Security Levels - regular strength of authentication */
    const SL_SAFE_OPS = "SafeOps";
    /** Security Levels - strong authentication */
    const SL_PRIVILEGED_OPS = "PrivilegedOps";
    /** Security Levels - exceptionally strong authentication */
    const SL_EXCEPTIONAL_OPS = "ExceptionalOps";
    /** Security Levels - internal system call */
    const SL_SYSTEM = "System";
    
    /**
     * Get request object
     * @return arguments (object)
     */
    public function params();
    
    /**
     * Get response object
     * @return result data (object)
     */
    public function result();
    
    /**
     * Get info object
     * @return info data (object)
     */
    public function info();
    
    /**
     * @return return raw input stream or throws error
     */
    public function rawInput();
    
    /**
     * @return return raw output stream (no result variables are expected)
     */
    public function rawOutput();
    
    /**
     * Get reference to Executor
     * @return \FutoIn\Executor\Executor
     */
    public function executor();
    
    /**
     * Get reference to Executor
     * @return \FutoIn\Executor\ChannelContext
     */
    public function channel();    
    
    /**
     * Set to abort request after specified timeout_ms from the moment of call.
     * It must override any previous cancelAfter() call.
     *
     * @note it is different from as.setTimeout() as inner step timeout does 
     * not override outer step timeout.
     *
     * @param integer timeout_ms - timeout in miliseconds to cancel after. 0 - disable timeout
     */
    public function cancelAfter( $timeout_ms );
    
    /**
     * info() access through RequestInfo interface / get value
     * @param $name State variable name
     */
    public function &__get( $name );
    
    /**
     * info() access through RequestInfo interface / check value
     * @param $name State variable name
     */
    public function __isset( $name );
}
