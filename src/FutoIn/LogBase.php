<?php

abstract class LogBase implements Log
{
    public function msgf( $lvl, $fmt, $args )
    {
        $args = func_get_args();
        array_splice( $args, 0, 2 );
        $msg = vsprintf( $msg, $args );
        $this->msg( $lvl, $msg );
    }

    public function msgs( $lvl )
    {
        return new LogMessageStreamImpl( $lvl, $this );
    }

    public function debugf( $fmt, $args )
    {
        $args = func_get_args();
        array_splice( $args, 0, 0, "debug" );
        call_user_func_array( array( $this, 'msgf' ), $args );
    }

    public function infof( $fmt, $args )
    {
        $args = func_get_args();
        array_splice( $args, 0, 0, "info" );
        call_user_func_array( array( $this, 'msgf' ), $args );
    }

    public function warnf( $fmt, $args )
    {
        $args = func_get_args();
        array_splice( $args, 0, 0, "warn" );
        call_user_func_array( array( $this, 'msgf' ), $args );
    }

    public function errorf( $fmt, $args )
    {
        $args = func_get_args();
        array_splice( $args, 0, 0, "error" );
        call_user_func_array( array( $this, 'msgf' ), $args );
    }

    public function securityf( $fmt, $args )
    {
        $args = func_get_args();
        array_splice( $args, 0, 0, "security" );
        call_user_func_array( array( $this, 'msgf' ), $args );
    }

    public function debugs()
    {
        return $this->msgs( 'debug' );
    }

    public function infos()
    {
        return $this->msgs( 'info' );
    }

    public function warns()
    {
        return $this->msgs( 'warn' );
    }

    public function errors()
    {
        return $this->msgs( 'error' );
    }

    public function securitys()
    {
        return $this->msgs( 'security' );
    }
}

class LogMessageStreamImpl implements LogMessageStream
{
    private $lvl;
    private $log_base;
    private $msg = "";
    
    public __construct( $lvl, $log_base )
    {
        $this->lvl = $lvl;
        $this->log_base = $log_base;
    }

    public function __destruct()
    {
        $this->complete();
    }

    public function write( $msg )
    {
        $this->msg += $msg;
    }
    
    public function complete()
    {
        if ( $this->log_base !== null )
        {
            $this->log_base->msg( $this->lvl, $this->msg );
            $this->log_base = null;
        }
    }
}
