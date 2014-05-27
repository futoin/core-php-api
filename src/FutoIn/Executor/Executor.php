<?php

namespace FutoIn\Executor;

interface Executor {
    public function addIface( $name, $impl );
    public function process( RequestInfo $req );
    public function ccm();
    public function checkAccess( $reqinfo, array $acd );
}
