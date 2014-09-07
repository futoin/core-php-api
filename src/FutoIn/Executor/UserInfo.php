<?php

namespace FutoIn\Executor;

/**
 * \warning DO NOT USE - IT WILL CHANGE
 */
interface UserInfo {
    public function getLocalID();
    public function getGlobalID();
    public function __get( $name );
}
