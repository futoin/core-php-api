<?php

namespace FutoIn;

interface AsyncSteps
{
    public function add( callable $func, callable $onerror );
    public function parallel( callable $onerror=null );
    public function state();
    public function success();
    public function error( $name );
    public function waitResult( $timeout_ms );
    public function __invoke();
    public function execute();
}
