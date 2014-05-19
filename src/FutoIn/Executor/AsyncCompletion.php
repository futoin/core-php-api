<?php

namespace FutoIn\Executor;

interface AsyncCompletion {
    public function parent();
    public function error( name );
    public function complete();
    public function checkAlive();
}
