<?php

namespace FutoIn\Invoker;

/**
 * \warning DO NOT USE - IT WILL CHANGE
 */
interface SimpleCCM
{
    public function register( $name, $iface, $endpoint );
    public function registerPlain( $name, $iface, $endpoint, $credentials );
    public function iface( $name, $iface=null );
    public function unRegister( $name );
    public function defense();
    public function log();
    public function burst();
}
