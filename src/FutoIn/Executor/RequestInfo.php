<?php

namespace FutoIn\Executor;

/**
 * \warning DO NOT USE - IT WILL CHANGE
 */
interface RequestInfo {
    const X509_CN = "X509_CN";
    const PUBKEY = "PUBKEY";
    const CLIENT_ADDR = "CLIENT_ADDR";
    const USER_AGENT = "USER_AGENT";
    const COOKIES = "COOKIES";
    const SECURE_CHANNEL = "SECURE_CHANNEL";
    const UPLOAD_FILES = "UPLOAD_FILES";
    const REQUEST_TIME_FLOAT = "REQUEST_TIME_FLOAT";

    const SL_ANONYMOUS = "Anonymous";
    const SL_INFO = "Info";
    const SL_SAFEOPS = "SafeOps";
    const SL_PRIVLEGED_OPS = "PrivilegedOps";
    const SL_EXCEPTIONAL_OPS = "ExceptionalOps";
    
    public function &request();
    public function &response();
    public function &info();
    public function error( $name );
    public function getSecurityLevel();
    public function isSecurityLevel( $lvl );
    public function getUser();
    public function getSourceAddress();
    public function getDerivedKey();
    public function log();
    public function files();
    public function rawoutput();
    public function context();
    public function ccm();
    public function &rawRequest();
    public function &rawResponse();
    public function ignoreInvokeAbort( $ignore = true );
}
