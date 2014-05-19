<?php

namespace FutoIn\Invoker;

interface DerivedKeyCall
{
    public function __construct( $iface );
    public function getDerivedKey();
    public function __call( $name, $args );
}
