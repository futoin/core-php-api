<?php
/**
 * FutoIn Executor Request Info
 *
 * @package FutoIn\Core\PHP\API
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
    /** User Agent, coming from HTTP headers or other source */
    const INFO_USER_AGENT = "USER_AGENT";
    /** array of strings */
    const INFO_COOKIES = "COOKIES";
    /** boolean - is request coming through secure channel? */
    const INFO_SECURE_CHANNEL = "SECURE_CHANNEL";
    /** map of upload_name -> file stream */
    const INFO_UPLOAD_FILES = "UPLOAD_FILES";
    /** platform-specific reference of request creation time */
    const INFO_REQUEST_TIME_FLOAT = "REQUEST_TIME_FLOAT";
    /** one of pre-defined security levels (auth levels) of current processing */
    const INFO_SECURITY_LEVEL = "SECURITY_LEVEL";
    /** user information object */
    const INFO_USER_INFO = "USER_INFO";

    /** Security Levels - no authenticated */
    const SL_ANONYMOUS = "Anonymous";
    /** Security Levels - read-only authentication */
    const SL_INFO = "Info";
    /** Security Levels - regular strength of authentication */
    const SL_SAFEOPS = "SafeOps";
    /** Security Levels - strong authentication */
    const SL_PRIVLEGED_OPS = "PrivilegedOps";
    /** Security Levels - exceptionally strong authentication */
    const SL_EXCEPTIONAL_OPS = "ExceptionalOps";
    
    /**
     * Get request object
     * @return arguments (object)
     */
    public function request();
    
    /**
     * Get response object
     * @return result data (object)
     */
    public function response();
    
    /**
     * Get info object
     * @return info data (object)
     */
    public function info();
    
    /**
     * Set request error and raise exception to complete execution
     * @return void
     */
    public function error( $name );
    
    /**
     * Get derived key used for current request
     * @return void
     */
    public function derivedKey();
    
    /**
     * Shortcut for ccm()->iface( "#log" )
     * @return Advanced Native Log system interface (FTN3)
     */
    public function log();
    
    /**
     * @return raw input stream
     */
    public function rawinput();
    
    /**
     * @return raw output stream
     */
    public function rawoutput();
    
    /**
     * Get reference to Executor
     * @return \FutoIn\Executor
     */
    public function context();
    
    /**
     * Alias for context()->ccm()
     * @return \FutoIn\Invoker\AdvancedCCM
     */
    public function ccm();
    
    /**
     * @return request object, representing FutoIn message
     */
    public function rawRequest();
    
    /**
     * @return response object, representing FutoIn message
     */
    public function rawResponse();
    
    /**
     * [un]mark request as ready to be canceled on Invoker abort (disconnect)
     * @param boolean $ignore Ignore user abort (yes/no)
     */
    public function ignoreInvokeAbort( $ignore = true );
    
    /**
     * Set HTTP response headers, should not be used in regular processing
     * @param string $name HTTP header name
     * @param string $name HTTP header value
     * @param boolean $override Should any previously set header with the same $name be overridden?
     */
    public function http_header( $name, $value, $override=true );
}
