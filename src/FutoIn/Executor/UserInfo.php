<?php

namespace FutoIn\Executor;

interface UserInfo {
    public function getLocalID();
    public function getGlobalID();
    public function __get( $name );
}
