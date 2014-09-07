<?php

namespace FutoIn\Invoker;

/**
 * \warning DO NOT USE - IT WILL CHANGE
 */
interface Iface
{
    public function call( $name, $params );
    public function callAsync( $name, $params, AsyncCallback $callback );
    public function callDataAsync( $name, $params, array &$upload_data, AsyncCallback $callback );
    public function iface();
    public function burst();
    public function __call( $name, $args );
}