<?php

namespace FutoIn\Invoker;

/**
 * \warning DO NOT USE - IT WILL CHANGE
 */
interface DerivedKeyCall
{
    public function __construct( $iface );
    public function getDerivedKey();
    public function __call( $name, $args );
}
