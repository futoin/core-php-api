<?php

namespace FutoIn;

/**
 * \warning DO NOT USE - IT WILL CHANGE
 */
interface DerivedKey
{
    public function getBaseID();
    public function getSequenceID();
    public function encrypt( $data );
    public function decrypt( $data );
    public function encryptAsync( AsyncSteps as, $data );
    public function decryptAsync( AsyncSteps as, $data );
    
}
