<?php

namespace FutoIn;

interface Log
{
    const LVL_DEBUG = "debug";
    const LVL_INFO = "info";
    const LVL_WARN = "warn";
    const LVL_ERROR = "error";
    const LVL_SECURITY = "security";

    public function msg( $lvl, $msg );
    public function hexdump( $lvl, $msg, $data );

    public function msgf( $lvl, $fmt, $args );
    public function msgs( $lvl );

    public function debug( $msg );
    public function info( $msg );
    public function warn( $msg );
    public function error( $msg );
    public function security( $msg );

    public function debugf( $fmt, $args );
    public function infof( $fmt, $args );
    public function warnf( $fmt, $args );
    public function errorf( $fmt, $args );
    public function securityf( $fmt, $args );
    
    public function debugs();
    public function infos();
    public function warns();
    public function errors();
    public function securitys();

}

interface LogMessageStream
{
    public function write( $msg );
    public function complete();
}
