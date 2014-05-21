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

    public function debug( $msg )
    {
        $this->msg( self::LVL_DEBUG, $msg );
    }

    public function info( $msg )
    {
        $this->msg( self::LVL_INFO, $msg );
    }

    public function warn( $msg )
    {
        $this->msg( self::LVL_WARN, $msg );
    }

    public function error( $msg )
    {
        $this->msg( self::LVL_ERROR, $msg );
    }

    public function security( $msg )
    {
        $this->msg( self::LVL_SECURITY, $msg );
    }


    public function debugf( $fmt, $args )
    {
        $args = func_get_args();
        array_splice( $args, 0, 0, self::LVL_DEBUG );
        call_user_func_array( array( $this, 'msgf' ), $args );
    }

    public function infof( $fmt, $args )
    {
        $args = func_get_args();
        array_splice( $args, 0, 0, self::LVL_INFO );
        call_user_func_array( array( $this, 'msgf' ), $args );
    }

    public function warnf( $fmt, $args )
    {
        $args = func_get_args();
        array_splice( $args, 0, 0, self::LVL_WARN );
        call_user_func_array( array( $this, 'msgf' ), $args );
    }

    public function errorf( $fmt, $args )
    {
        $args = func_get_args();
        array_splice( $args, 0, 0, self::LVL_ERROR );
        call_user_func_array( array( $this, 'msgf' ), $args );
    }

    public function securityf( $fmt, $args )
    {
        $args = func_get_args();
        array_splice( $args, 0, 0, self::LVL_SECURITY );
        call_user_func_array( array( $this, 'msgf' ), $args );
    }

    public function debugs()
    {
        return $this->msgs( self::LVL_DEBUG );
    }

    public function infos()
    {
        return $this->msgs( self::LVL_INFO );
    }

    public function warns()
    {
        return $this->msgs( self::LVL_WARN );
    }

    public function errors()
    {
        return $this->msgs( self::LVL_ERROR );
    }

    public function securitys()
    {
        return $this->msgs( self::LVL_SECURITY );
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
