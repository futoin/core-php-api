<?php

namespace FutoIn\Executor;

/**
 * \warning DO NOT USE - IT WILL CHANGE
 */
interface Executor {
    public function addIface( $name, $impl );
    public function process( \FutoIn\Executor\AsyncCompletion $async_iface );
    public function ccm();
    public function checkAccess( $reqinfo, array $acd );
}
