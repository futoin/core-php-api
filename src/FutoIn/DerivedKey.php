<?php

namespace FutoIn;

/**
 * \warning DO NOT USE - IT WILL CHANGE
 */
interface DerivedKey
{
    public function getRaw();
    public function getBaseID();
    public function getSequenceID();
    public function &encrypt( &$data );
    public function &decrypt( &$data );
}
