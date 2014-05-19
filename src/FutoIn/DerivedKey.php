<?php

namespace FutoIn;

interface DerivedKey
{
    public function getRaw();
    public function getBaseID();
    public function getSequenceID();
    public function encrypt( &$data );
    public function decrypt( &$data );
}
