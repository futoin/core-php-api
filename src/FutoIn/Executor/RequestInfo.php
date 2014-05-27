<?php

namespace FutoIn\Executor;

interface RequestInfo {
    public function &request();
    public function &response();
    public function &info();
    public function error( $name );
    public function getSecurityLevel();
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
