<?php

namespace FutoIn\Executor;

/**
 * \warning DO NOT USE - IT WILL CHANGE
 */
interface SourceAddress {
    const IPv4 = "IPv4";
    const IPv6 = "IPv6";

    public function getHost();
    public function getPort();
    public function getType();
}
