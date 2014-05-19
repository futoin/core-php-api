<?php

namespace FutoIn\Invoker;

interface SimpleCCM
{
    public function register( $name, $iface, $endpoint );
    public function registerPlain( $name, $iface, $endpoint, $credentials );
    public function iface( $name );
    public function unRegister( $name );
    public function defense();
    public function log();
    public function burst();
}
