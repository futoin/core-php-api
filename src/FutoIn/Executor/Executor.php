<?php

namespace FutoIn\Executor;

interface Executor {
    public function addIface( $name, $impl );
    public function process( \FutoIn\Executor\AsyncCompletion $async_iface );
    public function ccm();
    public function checkAccess( $reqinfo, array $acd );
}
