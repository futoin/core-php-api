<?php

namespace FutoIn\Executor;

interface RequestInfo {
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
    public function async();
    public function log();
    public function files();
    public function rawoutput();
    public function context();
    public function ccm();
    public function &rawRequest();
    public function &rawResponse();
}
