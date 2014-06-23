<?php

namespace FutoIn;

interface AsyncSteps
{
    public function add( callable $func, callable $onerror=null );
    public function parallel( callable $onerror=null );
    public function success( /* results */ );
    public function __invoke( /* results */ );
    public function error( $name );
    public function state();
    public function setTimeout( $timeout_ms );
    public function setCancel( callable $oncancel );
}
